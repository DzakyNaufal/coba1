<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Daftar Peminjaman Buku</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telp }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{ $item->tanggal_pengembalian }}</td>
                    <td>
                        <button onclick="window.print()">Print</button>
                        <button onclick="window.location.href='{{ route('peminjam.pdf', $item->id) }}'">PDF</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
