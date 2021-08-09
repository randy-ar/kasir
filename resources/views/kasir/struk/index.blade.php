@extends('layouts.app')
@section('content')
    <div class="container">
        @include('layouts.session')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <h4>List Pemebelian</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('struk.create') }}" class="btn btn-primary">Buat Pembelian</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td width="1%">No.</td>
                            <td>Tanggal</td>
                            <td>Kasir</td>
                            <td width="20%">Tindakan</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($struk as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td class="text-center">
                                    <a href="{{route('struk.show', $item->id)}}" class="btn btn-info">Lihat</a>
                                    <form action="{{ route('struk.delete', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus pembelian ?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$struk->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection