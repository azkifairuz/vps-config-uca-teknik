@include('layout/header')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Hasil Diagnosa</h1>
        <h1 class="text-center mb-4">{{$pasien->nama_pasien}}</h1>

        <div class="row">
            @foreach ($results as $penyakit => $persentase)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $penyakit }}</h5>
                            <p class="card-text">Persentase: {{ number_format($persentase, 2) }}%</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="">
            <h1 class="text-center mb-4">Kesimpulan</h1>
            <div class="card ">
               <div class="card-body">
                    <p>Berdasarkan hasil diagnosa, penyakit yang paling mungkin Anda alami adalah:</p>
                    <p><strong>{{ $penyakitTertinggi }}</strong> dengan persentase kemungkinan sebesar <strong>{{ number_format($maxPersentase, 2) }}%</strong>.</p>
                    <p>Solusi yang disarankan untuk penyakit ini adalah:</p>
                    <p><strong>{{ $solusiFromDb ? $solusiFromDb->solusi : 'Tidak ada solusi ditemukan' }}</strong></p>
                    <p>Disarankan untuk segera berkonsultasi dengan dokter atau ahli medis terkait untuk mendapatkan penanganan lebih lanjut dan memastikan diagnosa yang lebih akurat.</p>
               </div>
            </div>
            <div class="text-end mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Selesai
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Konsultasi Ulang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <h3>Apakah Anda ingin melakukan konsultasi ulang?</h1>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('halaman-test')}}" type="button" class="btn btn-primary">Ya</a>
                        <a  href="{{route('home')}}" type="button" class="btn btn-outline-primary" >Tidak</a>
                    </div>
                </div>
        </div>
    </div>

@include('layout/footer')
