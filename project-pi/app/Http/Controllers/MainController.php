<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\HasilDiagnosa;
use Illuminate\Support\Facades\Session;
class MainController extends Controller
{
    public function registerUser(Request $request) {
        $request->validate(
            [
            'nama' => 'required'
            ],
           [
            'nim' => 'required' 
           ],
           [
            'fakultas' => 'required'
           ],
        );  
        $isUserAlreadyCheck = Pasien::where('nim_mahasiswa','=',$request->nim)->first();
        if ($isUserAlreadyCheck) {
          Session::put('nim', $isUserAlreadyCheck->nim_mahasiswa);
          session()->put('step', 1);
          return redirect()
                ->route('halaman-test')
                ->with(['success' => 'Data Berhasil Disimpan']);
        }
              $item = Pasien::create([
                'nim_mahasiswa' => $request->nim,
                'nama_mahasiswa' => $request->nama,
                'fakultas' => $request->fakultas,

              ]);
              $item->save();
              Session::put('nim', $item->nim_mahasiswa);
              session()->put('step', 1);
              return redirect()
                ->route('halaman-test')
                ->with(['success' => 'Data Berhasil Disimpan']);

    }

    public function pertanyaan(Request $request) {
         $step = $request->session()->get('step', 1);
         $jawaban = $request->session()->get('jawaban', []);
        switch ($step) {
            case 1:
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G1', 'G3', 'G7'])->get();
                // sintaks diatas adalah pertanyaan
                break;
            case 2:
                if (in_array('G1', $jawaban)) {
                    $pertanyaan = Gejala::whereIn('kode_gejala', ['G2', 'G4'])->get();
                } elseif (in_array('G3', $jawaban)) {
                    $pertanyaan = Gejala::whereIn('kode_gejala', ['G14'])->get();
                } elseif (in_array('G7', $jawaban)) {
                  $pertanyaan = Gejala::whereIn('kode_gejala', ['G9'])->get();
                }
                break;
            case 3:
              if (in_array('G2', $jawaban)) {
                 $pertanyaan = Gejala::whereIn('kode_gejala', ['G5'])->get();
              } elseif (in_array('G4', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G6', 'G11'])->get();
              } elseif (in_array('G14', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G17'])->get();
              } elseif (in_array('G9', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G15'])->get();
              };
              break;
            case 4 :
              if (in_array('G5', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G7'])->get();
              } elseif (in_array('G6', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G9'])->get();
              } elseif (in_array('G11', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G14'])->get();
              } elseif (in_array('G17', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G19'])->get();
              } elseif (in_array('G15', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G18'])->get();
              }
              break;
            case 5 :
              if (in_array('G7', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G8'])->get();
              } elseif (in_array('G9',  $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G10'])->get();
                
              } elseif (in_array('G14',  $jawaban)) {
                  $pertanyaan = Gejala::whereIn('kode_gejala', ['G11'])->get();
              }
               elseif (in_array('G19', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G21'])->get();
              } elseif (in_array('G18', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G23'])->get();
              }
              break;
            case 6 :
              if (in_array('G8', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G12'])->get();
              } elseif (in_array('G10', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G13', ])->get();
              } elseif (in_array('G11', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G20'])->get();
              } elseif (in_array('G21', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G22'])->get();      
              } elseif (in_array('G23', $jawaban)) {
              $pertanyaan = Gejala::whereIn('kode_gejala', ['G25'])->get();
              }
              break;
            case 7 :
              if (in_array('G12', $jawaban)) {
                $pertanyaan = Penyakit::whereIn('kode_penyakit', ['K1'])->first();
                return redirect()->route('hasil', ['kode_penyakit' => $pertanyaan->kode_penyakit]);
              } elseif (in_array('G13', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G16'])->get();
              } elseif (in_array('G20', $jawaban)) {
                $pertanyaan = Penyakit::whereIn('kode_penyakit', ['K3'])->first();
                return redirect()->route('hasil', ['kode_penyakit' => $pertanyaan->kode_penyakit]);
              } elseif (in_array('G22', $jawaban)) {
                $pertanyaan = Gejala::whereIn('kode_gejala', ['G12'])->get();
              } elseif (in_array('G25', $jawaban)) {
                $pertanyaan = Penyakit::whereIn('kode_penyakit', ['K5'])->get();
              }
              break;
            case 8 :
              if (in_array('G16', $jawaban)) {
                $pertanyaan = Penyakit::where('kode_penyakit', 'K2')->first();
                return redirect()->route('hasil', ['kode_penyakit' => $pertanyaan->kode_penyakit]);
              } elseif (in_array('G12', $jawaban)) {
                $pertanyaan = Penyakit::where('kode_penyakit', 'K4')->first();
                return redirect()->route('hasil', ['kode_penyakit' => $pertanyaan->kode_penyakit]);
              }
              break;
            default:
                $pertanyaan = collect();
                break;
        }
        return view('gejala', compact('pertanyaan', 'step'));
    }

    public function jawaban(Request $request)
    {
        $jawaban = $request->input('jawaban', []);
        $existingJawaban = $request->session()->get('jawaban', []);
        $updatedJawaban = array_merge($existingJawaban, $jawaban);
        $request->session()->put('jawaban', $updatedJawaban);
        $request->session()->increment('step');

        return redirect()->route('halaman-test');
    }
    public function hasilDiagnosa($kode_penyakit)
    {
      $nim = Session::get('nim');
      $mahasiswa = Pasien::where('nim_mahasiswa',$nim)->first();
      $penyakit = Penyakit::where('kode_penyakit',$kode_penyakit)->first();

      $hasil = HasilDiagnosa::create([
        'nim_mahasiswa' => $mahasiswa->nim_mahasiswa,
        'kode_penyakit' => $penyakit->kode_penyakit
      ]);
        return view('hasil', compact('kode_penyakit','penyakit'));
    }

    public function listPasien()
    {
        // Join tabel hasil_diagnosa, pasien, dan penyakit
        $listPenyakit = HasilDiagnosa::join('pasien', 'hasil_diagnosa.nim_mahasiswa', '=', 'pasien.nim_mahasiswa')
            ->join('penyakit', 'hasil_diagnosa.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->select('pasien.nama_mahasiswa as mahasiswa', 'pasien.nim_mahasiswa as nim_mahasiswa', 'penyakit.penyakit as nama_penyakit')
            ->get();
        return view('list_passien', compact('listPenyakit'));
    }
    public function resetDiagnosa(Request $request) {
      $request->session()->forget('jawaban');
      $request->session()->put('step', 1);
  
      return redirect()->route('halaman-test');
  }
  
  }