@include('layout/header')
    <div class="container mt-5">
        <form action="{{ route('hasil-diagnosa') }}" method="POST">
            @csrf
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Gejala</th>
                <th scope="col">Gejala</th>
                <th scope="col">Pilih Kondisi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listGejala as $item)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$item->kode_gejala}}</td>
                    <td>{{$item->gejala}}</td>
                    <td>
                        <select class="form-select"  name="gejala[{{ $item->kode_gejala}}]"  aria-label="Default select example">
                            <option selected>Pilih Kondisi</option>
                            <option value="1">Sangat Yakin</option>
                            <option value="0.8">Yakin</option>
                            <option value="0.6">Cukup Yakin</option>
                            <option value="0.4">Sedikit Yakin</option>
                          </select>
                    </td>
                  </tr>
                @endforeach
                  
                <tr class="">
                    <td colspan="4" class="text-end">
                        <button class="btn btn-primary p-3">Hasil Diagnosa</button>
                    </td>
                </tr>
            </tbody>
          </table>
        </form>
    </div>
    @include('layout/footer')




