@include('layout/header')

    <div class="container mt-5">
        <h1>List Data Pasien</h1>
       
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">nama</th>
                <th scope="col">usia</th>
                <th scope="col">alamat</th>
                <th scope="col">penyakit</th>
                <th scope="col">solusi</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($listPasien as $item)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$item->nama_pasien}}</td>
                    <td>{{$item->usia_pasien}}</td>
                    <td>
                       {{$item->alamat_pasien}}
                    </td>
                    <td>
                       {{$item->penyakit}}
                    </td>
                    <td>
                       {{$item->solusi}}
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    @include('layout/footer')
