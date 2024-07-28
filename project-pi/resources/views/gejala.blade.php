@include('layout/header')
    <div class="container mt-5">
        <h1 class="mb-4 display-2 text-center">Pertanyaan Step {{ $step }}</h1>
        <form action="{{ route('jawaban') }}" method="POST" id="pertanyaanForm">
            @csrf
            <div class="row mt-5">
                @foreach ($pertanyaan as $gejala)
                    <div class="col-md-4 mb-3">
                        <div class="card gejala-card cursor-hover" data-value="{{ $gejala->kode_gejala ?? $gejala->kode_penyakit }}">
                            <div class="card-body text-decoration-none">
                                <h5 class="card-title lead">{{ $gejala->nama_gejala ?? $gejala->penyakit }}</h5>
                            </div>
                        </div>
                        <input type="hidden" name="jawaban[]" value="" class="gejala-input" id="input-{{ $gejala->kode_gejala ?? $gejala->kode_penyakit }}">
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary" style="display: none;" id="submitButton">Submit</button>
        </form>
    </div>
@include('layout/footer')


