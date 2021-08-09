<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$struk->created_at}}</title>
</head>
<body>
    <style>
        .table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <h4>Detail Pembelian</h4>
    <table width="100%" style="border: 0px; margin-bottom: 30px;">
        <thead style="border: 0px;">
            <tr>
                <td width="10%" style="border: 0px;">Kasir</td>
                <td width="1%" style="border: 0px;">:</td>
                <td style="border: 0px;">{{ $struk->user->name }}</td>
            </tr>
            <tr>
                <td width="10%" style="border: 0px;">Tanggal</td>
                <td width="1%" style="border: 0px;">:</td>
                <td style="border: 0px;">{{ $struk->created_at }}</td>
            </tr>
        </thead>
    </table>
    <table class="table" width="100%">
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
                <td colspan="2">Total harga: </td>
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
</body>
</html>