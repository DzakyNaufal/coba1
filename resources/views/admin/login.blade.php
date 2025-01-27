<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="card mt-4" style="width: 18rem; margin: auto;">
        <div class="card-body">
            <h5 class="card-title">Login Admin</h5>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" value="" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
