<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function printTable() {
            window.print();
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hi User</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/registrasi/create') }}">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/registrasi') }}">Daftar Pinjam</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-left mt-4">

        </div>

        <h2>Data Registrasi Peminjaman Buku</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('registrasi.create') }}" class="btn btn-primary float-end mb-3">Pinjam Buku</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="1">ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $registrasi)
                        <tr>
                            <td>{{ $registrasi->id }}</td>
                            <td>{{ $registrasi->nama }}</td>
                            <td>{{ $registrasi->email }}</td>
                            <td>{{ $registrasi->telp }}</td>
                            <td>{{ $registrasi->buku->judul }}</td>
                            <td>{{ $registrasi->tanggal_peminjaman }}</td>
                            <td>{{ $registrasi->tanggal_pengembalian }}</td>
                            <td>{{ $registrasi->status->nama }}</td> <!-- Assuming status relationship -->
                            <td>{{ $registrasi->alamat }}</td>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <a href="{{ route('registrasi.cetak', $registrasi->id) }}" class="btn btn-success btn-sm">Cetak</a>
                                    <form action="{{ route('registrasi.destroy', $registrasi->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash" style="color: white;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
