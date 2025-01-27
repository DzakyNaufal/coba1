<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <a class="nav-link" href="{{ url('/registrasi') }}">Registerasi</a>
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
            <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
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
                            <th>Tanggal Lahir</th>
                            <th>Telepon</th>
                            <th>Agama</th>
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
                            <td>{{ $registrasi->tanggal_lahir }}</td>
                            <td>{{ $registrasi->telp }}</td>
                            <td>{{ $registrasi->agama->nama }}</td> <!-- Assuming agama relationship -->
                            <td>{{ $registrasi->status->nama }}</td> <!-- Assuming status relationship -->
                            <td>{{ $registrasi->alamat }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button onclick="printTable()" class="btn btn-info btn-sm">Print</button>
                                    <a href="{{ route('registrasi.downloadPdf', $registrasi->id) }}" class="btn btn-success btn-sm">Download PDF</a>
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
