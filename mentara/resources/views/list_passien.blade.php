@include('layout/header')
    <div class="container mt-5">
        <h1>Daftar Pasien dan Penyakit</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM Mahasiswa</th>
                    <th>Nama Pasien</th>
                    <th>Penyakit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listPenyakit as $penyakit)
                <tr>
                    <td>{{ $penyakit->nim_mahasiswa }}</td>
                    <td>{{ $penyakit->mahasiswa }}</td>
                    <td>{{ $penyakit->nama_penyakit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('layout/footer')
