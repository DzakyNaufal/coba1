<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hi Admin</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/registrasi') }}">Registerasiiiiiiiiiiiiiiiiiii</a>
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
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registrasi Peminjaman Buku</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('cetak', ['id' => 'nama']) }}" enctype="multipart/form-data" onsubmit="return submitForm()">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="telp" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Agama</label>
                        <select name="agama" class="form-control" required>
                            @foreach($agama as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Judul Buku</label>
                        <select name="buku_id" class="form-control" required>
                            @foreach($buku as $b)
                            <option value="{{ $b->id }}">{{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jumlah Buku Tersisa</label>
                        <input type="number" class="form-control" name="jumlah_buku_tersisa" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tanggal_peminjaman" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tanggal_pengembalian" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Status Peminjam</label>
                        <select name="status" class="form-control" required>
                            @foreach($status as $d)
                            <option value="{{ $d->id }}" {{ $d->id == old('status') ? 'disabled' : '' }}>{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
