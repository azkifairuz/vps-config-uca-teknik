@include('layout/header')

<div class="container">
    <div class="card px-4 py-4 mt-5 shadow-lg" style="border-radius: 15px;">
        <h1 class="text-center">{{$pertanyaan->gejala}}</h1>
        <div class="d-flex justify-content-center gap-4 mt-4">
            <form action="{{ route('pertanyaan.jawab', ['id' => $pertanyaan->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="jawaban" value="iya">
                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Iya</button>
            </form>
            <form action="{{ route('pertanyaan.jawab', ['id' => $pertanyaan->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="jawaban" value="tidak">
                <button type="submit" class="btn btn-danger rounded-pill px-4 py-2">Tidak</button>
            </form>
        </div>
    </div>
</div>

@include('layout/footer')
