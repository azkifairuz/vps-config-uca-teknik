<!-- resources/views/hasil.blade.php -->
@include('layout.header')

<div class="container">
    <div class="card px-4 py-4 mt-5 shadow-lg" style="border-radius: 15px;">
        @if ($penyakit)
            <h1 class="text-center">Penyakit yang terdeteksi: {{$penyakit->penyakit}}</h1>
            <p class="text-center">{{$penyakit->deskripsi}}</p>
        @else
            <h1 class="text-center">Tidak ada penyakit yang terdeteksi berdasarkan jawaban Anda.</h1>
        @endif
    </div>
</div>

@include('layout.footer')
