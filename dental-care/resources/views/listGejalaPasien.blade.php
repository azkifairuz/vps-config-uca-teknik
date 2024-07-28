@include('layout/header')

    <div class="container mt-5">
      <h1>List Data Gejala Pasien {{ $namaPasien }}</h1>
       
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
        
                <th>Gejala</th>
                <th>bobot_user</th>

              </tr>
            </thead>
            <tbody>
                @foreach($listGejala as $user)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{ $user->kode_gejala }}</td>
                    <td>{{ $user->bobot_user }}</td>
                    
                      
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
@include('layout/footer')
