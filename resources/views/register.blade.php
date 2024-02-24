<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">FORM REGISTER USER</h3>
                <hr>
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <form action="{{route('actionregister')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-user"></i> Name</label>
                        <input type="text" name="name" class="form-control" placeholder="name" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-key"></i> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                    <hr>
                    <p class="text-center">Sudah punya akun silahkan <a href="{{ route('login') }}">Login Disini!</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
