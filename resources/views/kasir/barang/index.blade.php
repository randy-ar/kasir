@extends('layouts.app')
@section('content')
    <style>
        .img{
            height: 18rem;
            background: no-repeat center center scroll;
            object-fit: cover;
            background-size: cover;
        }
    </style>
    <div class="container">
        @include('layouts.session')
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <h4>List Barang</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($barang as $item)
                <div class="col-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top img" src="{{ asset($item->foto) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p><small>Harga barang : Rp.{{ $item->harga }},-</small></p>
                            <p><small class="text-muted">Kode barang : {{ $item->kode }}</small></p>
                            <div class="d-block mt-2 text-center">
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-success d-inline">Edit</a>
                                <form action="{{ route('barang.delete', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Barang ini ? ');">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$barang->links()}}
        </div>
    </div>
@endsection