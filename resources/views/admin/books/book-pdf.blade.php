<!DOCTYPE html>
<html>
<head>
    <title>Laporan Buku Perpus Digital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        @page {
            size: landscape;
        }
    </style>
</head>
<body>
    {{-- <h1>{{ $title }}</h1> --}}
    {{-- <p>{{ $date }}</p> --}}
    <p>Data Buku </p>
  
    <table id="example" class="table table-hover table-bordered data-table text-nowrap">
        <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            {{-- <th>Sinopsis</th> --}}
            <th>Tahun Terbit</th>
        </tr>
        @foreach ($book as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->isbn }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->penerbit }}</td>
            <td>{{ $item->kategori }}</td>
            {{-- <td>{{ $item->sinopsis }}</td> --}}
            <td>{{ $item->tahun_terbit }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>
