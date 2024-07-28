@include('layout/header')
 
    <div class="container mt-5">
        <h1>List Data Gejala Pasien</h1>
       
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>Nama User</th>
                

              </tr>
            </thead>
            <tbody>
                @foreach($listGejala as $user)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{ $user->nama_pasien }}</td>
                    <td>
                        <a href="{{ route('gejala-pasien', ['id' => $user->id]) }}">
                            <button>Detail Gejala</button>
                        </a>
                    </td>
                  
                      
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    @include('layout/footer')
