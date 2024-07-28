<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
class PertanyaanController extends Controller
{
    public function showPertanyaan($id)
    {
        $pertanyaan = Gejala::find($id);
        return view('pertanyaan', compact('pertanyaan'));
    }

    public function jawabPertanyaan(Request $request, $id)
    {
        $jawaban = $request->input('jawaban'); // menerima jawaban dari request

        // Simpan jawaban pengguna ke session
        $gejala = session('gejala', []);
        if ($jawaban == 'iya') {
            $gejala[] = $id;
        }
        session(['gejala' => $gejala]);

        // Cek apakah ada pertanyaan berikutnya
        $next_id = Gejala::where('id', '>', $id)->min('id');
        if ($next_id) {
            return redirect()->route('pertanyaan', ['id' => $next_id]);
        } else {
            // Jika tidak ada pertanyaan berikutnya, proses aturan untuk menentukan penyakit
            return redirect()->route('hasil');
        }
    }

    public function hasil()
    {
        $gejala = session('gejala', []);
        
        // Daftar aturan
        $rules = [
            'P1' => [1, 3, 24, 27, 29, 30, 31, 32],
            'P2' => [1, 2, 3, 4, 5],
            'P3' => [17, 18, 19],
            'P4' => [3, 6, 7, 8, 9],
            'P5' => [3, 10, 11, 12, 13, 14],
            'P6' => [14, 15, 16],
            'P7' => [13, 20, 25],
            'P8' => [21, 22, 23],
            'P9' => [25, 26],
            'P10' => [27, 28],
        ];

        // Cari penyakit berdasarkan aturan
        $penyakit_ditemukan = null;
       
        foreach ($rules as $penyakit => $gejala_aturan) {
            if (count(array_intersect($gejala, $gejala_aturan)) == count($gejala_aturan)) {
                $penyakit_ditemukan = $penyakit;
                break;
            }
        }

        // Ambil data penyakit dari database
        if ($penyakit_ditemukan) {
            $penyakit = Penyakit::where('kode_penyakit', $penyakit_ditemukan)->first();
        } else {
            $penyakit = null;
        }

        return view('hasil', compact('penyakit'));
    }
    public function mulaiTes()
{
    // Hapus session 'pertanyaan'
    session()->forget('pertanyaan');
    session()->forget('jawaban');
    session()->forget('gejala');

    // Redirect ke pertanyaan pertama
    return redirect()->route('pertanyaan', ['id' => 1]);
}
}
