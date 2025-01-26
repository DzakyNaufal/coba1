<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            margin: 0;
        }
        header {
            display: flex;
            font-weight: bold;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
        }
        .container {
            text-align: center;
            margin-top: auto;
            margin-bottom: auto;
        }
        .container h1 {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #f4f4f4;
        }
        footer a {
            margin: 0 10px;
        }
        footer img {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div></div> <!-- Placeholder untuk menyelaraskan posisi kanan -->
        <div>Hi Bosss!</div>
    </header>

    <div class="container">
        <h1>Selamat Datang Di Halaman Kami</h1>
        <div>
            <a href="{{ url('/penulis') }}" class="btn btn-success">Penulis</a>
            <a href="{{ url('/buku') }}" class="btn btn-dark">Buku</a>
            <a href="{{ url('/registrasi') }}" class="btn btn-warning">Form Registrasi</a>
        </div>

        <!-- Login Card -->
        <div class="card mt-4" style="width: 18rem; margin: auto;">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="user@mail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <a href="https://www.instagram.com/dzakyyy_._?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
        </a>
        <a href="https://www.tiktok.com/@dzakyyy_._?is_from_webapp=1&sender_device=pc" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Ionicons_logo-tiktok.svg" alt="TikTok">
        </a>
        <a href="https://youtube.com/@dzakynaufal4257?si=CNV-dMVXoWkzmr9x" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" alt="YouTube">
        </a>
    </footer>
</body>
</html>
