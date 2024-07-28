<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\gejala;
use App\Models\solusi;
use App\Models\penyakit;
use App\Models\diagnosa;
use App\Models\userGejala;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function registeruser(Request $request) {
        $request->validate(
            [
            'nama' => 'required'
            ],
            [
            'usia' => 'required'
            ],
            [
            'alamat' => 'required'
            ],
          );
        $isPassienAlreadyExist = pasien::where('nama_pasien',$request->name)->first();
        if ($isPassienAlreadyExist) {
            session()->put('idPassien',$item->id);
            return redirect()
              ->route('halaman-test')
              ->with(['success' => 'Data Berhasil Disimpan']);
        }

    $item = pasien::create([
        'nama_pasien' => $request->nama,
        'usia_pasien' => $request->usia,
        'alamat_pasien' => $request->alamat,
      ]);
      $item->save();
      session()->put('idPassien',$item->id);
      return redirect()
        ->route('halaman-test')
        ->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function test(){
       $listGejala = gejala::get();
       return view('gejala',compact('listGejala'))->with('i');
    }

    public function hasilDiagnosa(Request $request)
    {
        $gejala = $request->input('gejala');  // Mengambil data gejala dari request
        

        // Definisikan aturan penyakit dan gejala-gejalanya
        $rules = [
            'Periodontitis' => ['G1', 'G12', 'G13', 'G14', 'G15'],
            'Iritasi Pulpa' => ['G4', 'G5', 'G10'],
            'Gangren Radix' => ['G3', 'G4', 'G7', 'G8', 'G15'],
            'Pulpitis' => ['G7', 'G9', 'G10', 'G11'],
            'Pericoronitis' => ['G2', 'G4', 'G6', 'G8', 'G15'],
        ];
    
        $results = [];
        $solusi = [
            'Periodontitis' => 'S1',
            'Iritasi Pulpa' => 'S2',
            'Gangren Radix' => 'S3',
            'Pulpitis' => 'S4',
            'Pericoronitis' => 'S5',
        ];
    
        $maxPersentase = 0;
        $penyakitTertinggi = '';
        $pasien = pasien::where('id', session()->get('idPassien'))->first();
    
        // Iterasi melalui setiap penyakit
        foreach ($rules as $penyakit => $gejalaPenyakit) {
            $cfKumulatif = 0; // Variabel untuk menyimpan CF kumulatif
    
            // Iterasi melalui gejala-gejala untuk penyakit ini
            foreach ($gejalaPenyakit as $kodeGejala) {
                if (isset($gejala[$kodeGejala]) && $gejala[$kodeGejala] > 0.4) {  // Jika nilai keyakinan lebih besar dari 0.4
                    $nilaiKeyakinan = $gejala[$kodeGejala];
                    $nilaiKeyakinanDokter = Gejala::where('kode_gejala', '=', $kodeGejala)
                        ->select('bobot as bobotDokter')
                        ->first();  // Mengambil satu hasil
                        $userGejala = userGejala::create([
                            'id_user' => $pasien->id,
                            'kode_gejala' => $kodeGejala,
                            'bobot_user' => $nilaiKeyakinan,
                        ]);
                        $userGejala->save();
                    if ($nilaiKeyakinanDokter) {
                        // Konversi bobotDokter ke float
                        $bobotDokter = floatval($nilaiKeyakinanDokter->bobotDokter);
                        $nilaiKeyakinanFloat = floatval($nilaiKeyakinan);
                        $cfHE = $bobotDokter * $nilaiKeyakinanFloat;
    
                        // Menghitung CF kumulatif
                        if ($cfKumulatif == 0) {
                            $cfKumulatif = $cfHE;
                        } else {
                            $cfKumulatif = $cfKumulatif + ($cfHE * (1 - $cfKumulatif));
                        }
                    }
                }
            }
    
            // Mengalikan CF kumulatif dengan 100 untuk mendapatkan persentase
            $cfKumulatifPersentase = $cfKumulatif * 100;
            $results[$penyakit] = $cfKumulatifPersentase;
            // Cek untuk menemukan persentase tertinggi
            if ($cfKumulatifPersentase > $maxPersentase) {
                $maxPersentase = $cfKumulatifPersentase;
            
                $penyakitTertinggi = $penyakit;
            }

        }
        $solusiPenyakit = $solusi[$penyakitTertinggi];
        $solusiFromDb = solusi::where('kode_solusi','=',$solusiPenyakit)->first();
        $getPenyakit = penyakit::where('penyakit',$penyakit)->first();
        $saveHistoryPasien = diagnosa::create([
            'id_passien' => session()->get('idPassien'),
            'id_penyakit' => $getPenyakit->id,
            'id_solusi' => $solusiFromDb->id,
        ]);

        
        // Menampilkan hasil dalam view
        return view('hasil_diagnosa', compact('results','solusiFromDb','penyakitTertinggi','maxPersentase','pasien'));
    }
    public function listPasien() {
        $listGejala = pasien::select('pasien.id', 'pasien.nama_pasien')->get();

        return view('listPasien',compact('listGejala'))->with('i');
    }

    public function gejalaPasien($id) {
        $listGejala = userGejala::select('pasien.id', 'pasien.nama_pasien', 'user_gejala.kode_gejala', 'user_gejala.bobot_user') 
            ->join('pasien', 'user_gejala.id_user', '=', 'pasien.id')
            ->where('pasien.id', '=', $id)
            ->get();
    
        // Mengambil nama pasien dari data gejala
        $namaPasien = $listGejala->first() ? $listGejala->first()->nama_pasien : 'Tidak Diketahui';
    
        return view('listGejalaPasien', compact('listGejala', 'namaPasien'))->with('i');
    }
    
    public function listHasil () {
        $listPasien = diagnosa::join('pasien', 'diagnosa.id_passien','=','pasien.id')
        ->join('solusi','diagnosa.id_solusi','=','solusi.id')
        ->join('penyakit','diagnosa.id_penyakit','=','penyakit.id')
        ->select('solusi.solusi','penyakit.penyakit','pasien.nama_pasien','pasien.usia_pasien','pasien.alamat_pasien')
        ->get();
        return view('list',compact('listPasien'))->with('i');        
    }

}