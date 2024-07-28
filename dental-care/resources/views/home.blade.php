
@include('layout/header')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dental Care</a>
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

    <div class="container center-content ">
        <div class="row align-items-center w-100 mt-5">
            <div class="col-md-6 order-1 order-md-2 text-center">
                <img src="{{ asset('gigi.png') }}" alt="Top Image" class="top-image">
            </div>
            <div class="col-md-6 order-2 order-md-1 ">
                <h1 class="display-4">Sistem Pakar Dental Care</h1>
                <h2 class="mb-4">Menjaga Kesehatan Gigi Guna Senyum Percaya Diri</h2>
                <p class="lead mb-4">Kami Di Sini Untuk Membantu Anda.</p>
                <ul class="list-unstyled mb-4">
                    <li class="lead">Apa yang anda rasakan?</li>
                </ul>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Mulai
                </button>
            </div>
        </div>
    </div>
    
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
                        <!-- Start Form -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" name="usia" class="form-control" id="usia" placeholder="Usia">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                        </div>
                        <!-- End Form -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Additional Content -->
    <div class="container mt-5" id="about">
        <div class="row">
            <div class="col-md-12">
                <h3>Tentang Aplikasi Ini</h3>
                <p>
                    Aplikasi Sistem Pakar Dental Care dirancang untuk membantu Anda menjaga kesehatan gigi dan mulut. 
                    Dengan menggunakan teknologi terkini, aplikasi ini dapat memberikan saran dan solusi atas masalah gigi 
                    yang Anda alami berdasarkan gejala yang Anda rasakan.
                </p>
                <p>
                    Anda hanya perlu memasukkan gejala yang Anda rasakan, dan sistem akan memberikan rekomendasi berdasarkan 
                    data dan pengetahuan dari para ahli di bidang kesehatan gigi. Aplikasi ini dapat digunakan oleh semua kalangan 
                    dan bertujuan untuk meningkatkan kesadaran akan pentingnya kesehatan gigi.
                </p>
                <h3>Informasi Tentang Skor Keyakinan</h3>
                <p>
                    Dalam memberikan rekomendasi, aplikasi ini menggunakan sistem skor keyakinan untuk menunjukkan tingkat keyakinan 
                    sistem terhadap solusi yang diberikan. Berikut adalah rincian skor keyakinan:
                </p>
                <ul>
                    <li>Sangat Yakin: 1</li>
                    <li>Cukup Yakin: 0.8</li>
                    <li>Yakin: 0.6</li>
                    <li>Sedikit Yakin: 0.4</li>
                </ul>
                <p>
                    Skor ini membantu Anda memahami seberapa yakin sistem terhadap rekomendasi yang diberikan, sehingga Anda dapat 
                    membuat keputusan yang lebih baik mengenai langkah-langkah selanjutnya untuk menjaga kesehatan gigi Anda.
                </p>
            </div>
        </div>
    </div>
@include('layout/footer')


