@foreach($konsumen as $k)
    {{ $k->jenis_konsumen }}
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
@endforeach