<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: 2px solid #cf4b34; /* Menambahkan border dengan warna dan ketebalan */
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center text within the card */
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #cf4b34;
        }

        .card-text {
            font-size: 1.1rem;
        }

        .container {
            max-width: 600px;
        }

        .card-img-top {
            width: 100%; /* Make the image responsive */
            height: auto; /* Maintain aspect ratio */
            border-radius: 15px 15px 0 0; /* Rounded corners for the top */
        }

        @media print {
            /* Print-specific styles */
            body {
                margin: 0;
                padding: 0;
            }

            .card {
                box-shadow: none; /* Remove shadow for print */
            }

            .card-img-top {
                width: auto; /* Ensure full size for print */
            }

            /* Hide elements with the class 'no-print' during print */
            .no-print {
                display: none; /* Hide elements with the class 'no-print' */
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Detail Pendaftaran</h2>
        <br>
        <div class="p-4 card">
            <div class="d-flex justify-content-center">
                <img src="{{ url('images/book2.png') }}" alt="Descriptive text about the image"
                    class="mb-3 card-img-top w-25"> <!-- Gambar lebih kecil dengan margin bawah -->
            </div>
            <h5 class="card-title">Nomer Peminjaman: {{ $register->id }}</h5>
            <p class="card-text"><strong>Nama:</strong> {{ $register->nama }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $register->email }}</p>
            <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $register->tanggal_lahir }}</p>
            <p class="card-text"><strong>Judul Buku:</strong> {{ $register->buku->nama }}</p>
            <p class="card-text"><strong>Tanggal Peminjaman:</strong> {{ $register->tanggal_peminjaman }}</p>
            <p class="card-text"><strong>Tanggal Pengembalian:</strong> {{ $register->tanggal_pengembalian }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $register->status->nama }}</p>
            <p class="card-text"><strong>No Hp:</strong> {{ $register->telp }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $register->alamat }}</p>
        </div>
        <div class="mt-4 text-center no-print"> <!-- Add 'no-print' class here -->
            <button type="button" class="btn btn-primary no-print"
                onclick="window.location='{{ route('register.download', $register->id) }}'">
                Download PDF
            </button>
            <button class="btn btn-secondary no-print" onclick="window.print()">Print</button>
        </div>
    </div>
</body>

</html>
