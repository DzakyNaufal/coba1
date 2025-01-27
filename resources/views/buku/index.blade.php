<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hi Admin</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/penulis') }}">Penulis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/buku') }}">Buku</a>
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

        <h2>Data Buku Terbaik Abad-21</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('buku.create') }}" class="btn btn-primary float-end mb-3">Tambah Buku</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="1">ID</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th> <!-- New column for penulis -->
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $Buku)
                        <tr>
                            <td>{{ $Buku->id }}</td>
                            <td>{{ $Buku->judul }}</td>
                            <td>{{ $Buku->penulis }}</td> <!-- Display penulis data -->
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('buku.edit', $Buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <div>
                                        <form action="{{ route('buku.destroy', $Buku->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
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
