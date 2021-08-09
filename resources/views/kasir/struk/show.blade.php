@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Detail Pembelian</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <table width="100%" class="ml-3">
                        <thead>
                            <tr>
                                <td width="10%">Kasir</td>
                                <td width="1%">:</td>
                                <td>{{ $struk->user->name }}</td>
                            </tr>
                            <tr>
                                <td width="10%">Tanggal</td>
                                <td width="1%">:</td>
                                <td>{{ $struk->created_at }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <table class="table table-bordered mx-3">
                        <thead>
                            <tr>
                                <td width="1%">No.</td>
                                <td>Nama Barang</td>
                                <td>Harga Barang</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $total = 0;
                            @endphp
                            @foreach ($struk->barang as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>Rp. {{$item->harga}},-</td>
                                </tr>
                            @php
                                $total += $item->harga;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="2">Total harga : </td>
                                <td>Rp. {{$total}},-</td>
                            </tr>
                            <tr>
                                <td colspan="2">Payment : </td>
                                <td>Rp. {{$struk->uang}},-</td>
                            </tr>
                            <tr>
                                <td colspan="2">Kembalian : </td>
                                <td>Rp. {{!empty($struk->uang) ? $struk->uang - $total : '' }},-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{route('struk.cetak', $struk->id)}}" class="btn btn-danger">Print PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection