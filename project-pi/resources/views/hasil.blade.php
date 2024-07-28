@include('layout/header')

    <div class="container mt-5">
        <h1 class="text-center primary-color p-3">Kesimpulan Jawaban</h1>
        <div class="card">
            <div class="card-body">
                @if($penyakit)
                <h5 class="card-title text-center">{{$penyakit->penyakit}}</h5>
                <p class="card-text text-center">
                    @switch($penyakit->kode_penyakit)
                        @case('K1')
                            Skizofrenia adalah gangguan mental yang serius dimana penderitanya mengalami kesulitan dalam membedakan antara kenyataan dan pikiran mereka sendiri. Gejala utama termasuk halusinasi, delusi, dan pemikiran yang kacau.
                            @break
                        @case('K2')
                            Post Traumatic Stress Disorder (PTSD) adalah kondisi mental yang dipicu oleh kejadian traumatis. Penderita PTSD mungkin mengalami kilas balik, mimpi buruk, dan kecemasan yang parah, serta pikiran yang tidak terkendali tentang kejadian tersebut.
                            @break
                        @case('K3')
                            Depresi adalah gangguan mood yang menyebabkan perasaan sedih yang berkepanjangan dan hilangnya minat pada aktivitas yang biasanya dinikmati. Ini dapat mempengaruhi cara seseorang berpikir, merasa, dan berperilaku serta dapat menyebabkan berbagai masalah emosional dan fisik.
                            @break
                        @case('K4')
                            Bipolar adalah gangguan mental yang ditandai dengan perubahan suasana hati yang ekstrem antara depresi dan mania. Episode mania meliputi perasaan euforia, energi tinggi, dan impulsif, sedangkan episode depresi meliputi perasaan sedih dan putus asa.
                            @break
                        @case('K5')
                            Paranoia adalah kondisi mental di mana seseorang merasa curiga secara berlebihan dan tidak rasional terhadap orang lain. Ini dapat menyebabkan ketidakpercayaan yang ekstrem dan perasaan bahwa orang lain berusaha menyakitinya.
                            @break
                        @default
                            Informasi mengenai penyakit tidak tersedia.
                    @endswitch
                </p>
                <h6 class="card-text text-center">Segera ke psikolog untuk mendapatkan solusinya</h6>
                @endif
            </div>
        </div>
        <div class="text-center mt-4">
            <form action="{{ route('reset-diagnosa') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-custom mx-2">Diagnosa Ulang</button>
            </form>
            <a href="{{route('home')}}" class="btn btn-custom mx-2">Selesai</a>
        </div>
    </div>
 @include('layout/footer')
