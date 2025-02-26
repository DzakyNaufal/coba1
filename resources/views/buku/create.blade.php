<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tambah Judul Buku</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul">
            </div>
            <br>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" class="form-control" name="penulis"> <!-- New field for penulis -->
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ '/buku' }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
</body>
</html>
