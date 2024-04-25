<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman Perpus Digital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{-- <h1>{{ $title }}</h1> --}}
    {{-- <p>{{ $date }}</p> --}}
    <p>Data Peminjaman </p>
  
    <table id="example" class="table table-hover table-bordered data-table text-nowrap">
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Buku Yang Dipinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            {{-- <th>Gambar</th> --}}
        </tr>
        @foreach ($barangs as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if($item->user)
                {{ $item->user->nickname }}
            @else
                User tidak ditemukan
            @endif
            </td>
            @if($item->book)
                <td>{{ $item->book->judul }}</td>
            @else
                <td>Buku tidak ditemukan</td>
            @endif
            <td>{{ $item->pinjam }}</td>
            <td>{{ $item->kembali }}</td>
            <td>{{ $item->status }}</td>
            {{-- <td>
                @if($item->book->img)
                    <img src="{{ asset('storage/images/'.$item->book->img) }}" alt="{{ $item->judul }}" style="width: 70px;">
                @else
                    <p>Tidak ada gambar</p>
                @endif
            </td>             --}}
        @endforeach
        </tr>
    </table>
  
</body>
</html>