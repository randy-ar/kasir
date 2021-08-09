@extends('layouts.app')
@section('content')
    <div class="container">
        @include('layouts.session')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <h4>Tambah Barang</h4>
                    </div>
                </div>
            </div>
            <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Barang</label> <small class="ml-3 text-success">*Harus diisi</small>
                    <input type="text" name="nama" id="nama" class="form-control">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode">Kode barang</label> <small class="ml-3 text-success">*Harus diisi</small>
                    <input type="text" name="kode" id="kode" class="form-control">
                    @error('kode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga barang</label> <small class="ml-3 text-success">*Harus diisi</small>
                    <input type="number" name="harga" id="harga" class="form-control">
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto barang</label> <small class="ml-3 text-secondary">*Tidak harus diisi</small>
                    <input type="file" name="foto" id="foto" class="form-control">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
@endsection