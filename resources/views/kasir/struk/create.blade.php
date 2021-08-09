@extends('layouts.app')
@section('content')
    <div class="container">
        @include('layouts.session')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <h4>Buat Pembelian</h4>
                    </div>
                </div>
            </div>
            <form action="{{ route('struk.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="uang">Payment</label><small class="ml-3 text-secondary">*Tidak harus diisi</small>
                    <input type="number" name="uang" v-model="uang" class="form-control" placeholder="Rp. ,-">
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="list_barang">Pilih Barang</label>
                        <select class="custom-select form-control js-example-basic-multiple" v-model="nama_barang" name="list_barang">
                            @foreach ($barang as $item)
                                <option value="{{$item->id}}" v-bind:value="{ id: {{$item->id}}, text: '{{$item->nama}}'}">{{$item->nama}}</option>
                            @endforeach
                        </select> 
                        @error('list_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="col-md-3">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" v-model="jumlah" class="form-control">
                    </div> --}}
                </div>
                {{-- <div class="row mx-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama Barang</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>
                        <tbody v-html="table">

                        </tbody>
                    </table>
                </div> --}}
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buat Pembelian</button>
            </div>
            </form>

        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/something.js') }}"></script>
@endpush