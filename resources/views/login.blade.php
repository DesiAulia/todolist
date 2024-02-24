<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Aplikasi To-Do List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Mengatur latar belakang dengan gradasi */
        body {
            background: linear-gradient(to right, #EDE7F6, #D1C4E9); /* Menggunakan warna gradasi */
            height: 100vh; /* Menyamakan tinggi latar belakang dengan tinggi layar */
            display: flex; /* Menggunakan flexbox untuk menengahkan konten */
            justify-content: center; /* Menengahkan konten secara horizontal */
            align-items: center; /* Menengahkan konten secara vertikal */
        }

        /* Mengatur tombol utama */
        .btn-primary {
            background-color: navy; /* Warna latar belakang tombol */
            border-color: navy; /* Warna border tombol */
        }

        /* Mengatur warna teks tombol */
        .btn-primary:hover {
            background-color: #001F3F; /* Warna latar belakang tombol saat dihover */
            border-color: #001F3F; /* Warna border tombol saat dihover */
        }
    </style>
</head>
<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>Aplikasi To-Do List</b></h2>
            <p class="text-center">Oleh Kelompok 4</p>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                <hr>
                <p class="text-center">Belum punya akun? <a href="{{route('register')}}">Register</a> sekarang!</p>
            </form>
        </div>
    </div>
</body>
</html>
