@include('layout/header')
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mentara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container  d-flex justify-content-center vh-100 align-items-center">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-left mb-0">PEDULI pada PIKIRAN</h1>
                <h1 class="text-left mb-2">PEDULI pada DIRI.
                </h1>
                <p class="text-left">Kami di sini untuk Mendengarkan dan Membantu Anda.</p>
                <ul class="list-unstyled text-left">
                    <li class="fs-4" >Masukkan nama lengkap dan nomor induk mahasiswa Anda.</li>
                    <li class="fs-4">Jawab beberapa pertanyaan.</li>
                </ul>
                <div class="text-left">
                    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Mulai Test
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('kepala.png')}}" alt="Descriptive Alt Text" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container mt-5" id="about">
      <div class="row">
          <div class="col-md-12">
              <h3>Tentang Aplikasi Ini</h3>
              <p>
                Sistem pakar kesehatan mental adalah sebuah aplikasi berbasis komputer yang menggunakan pengetahuan dan aturan-aturan yang diambil dari para ahli di bidang kesehatan mental untuk memberikan diagnosis, saran, dan rekomendasi kepada pengguna. 
                Sistem ini dirancang untuk meniru kemampuan pengambilan keputusan seorang pakar kesehatan mental dengan tujuan untuk membantu individu dalam mengidentifikasi, memahami, dan mengelola masalah kesehatan mental mereka.
              </p>
              <p>
                  Anda hanya perlu memilih gejala yang Anda rasakan, dan sistem akan memberikan rekomendasi berdasarkan 
                  data dan pengetahuan dari para ahli di bidang kesehatan mental. Aplikasi ini dapat digunakan oleh semua kalangan 
                  dan bertujuan untuk meningkatkan kesadaran akan pentingnya kesehatan mental.
              </p>
              </p>
          </div>
      </div>
  </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('register-user') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Diri</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nim</label>
                            <input type="text" name="nim" class="form-control" id="exampleFormControlInput1" placeholder="12110000">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fakultas</label>
                            <input type="text" name="fakultas" class="form-control" id="exampleFormControlInput1" placeholder="Contoh. FT">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@include('layout/footer')

