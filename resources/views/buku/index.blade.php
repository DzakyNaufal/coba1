<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>
<body>
    <div class="container">
        <h2>Data Buku Datatable</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('Buku.create') }}" class="btn btn-primary float-end mb-3">Tambah Buku</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="1">ID</th>
                            <th>Nama</th>
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $Buku)
                        <tr>
                            <td>{{ $Buku->id }}</td>
                            <td>{{ $Buku->nama }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href={{ route('Buku.edit', $Buku -> id) }} class="btn btn-warning btn-sm">Edit</a>
                                    <div>
                                        <form action="{{ route('Buku.destroy', $Buku -> id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')"
                                            type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
    <script>
        new DataTable('.datatable'); // menggunakan class
    </script>
</body>
</html>
