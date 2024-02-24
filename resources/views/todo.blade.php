<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplikasi To-Do List')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Mengatur warna latar belakang navbar */
        .navbar-default {
            background-color: #5C6BC0; /* Warna latar belakang */
            border-color: #3949AB; /* Warna border */
            color: #FFFFFF; /* Warna teks */
        }

        /* Mengatur warna latar belakang body */
        body {
            background-color: #E8EAF6; /* Warna latar belakang */
        }

        /* Mengatur margin untuk todo-table */
        .todo-table {
            margin-top: 20px;
        }

        /* Mengatur warna tombol primary */
        .btn-primary {
            background-color: #3949AB; /* Warna latar belakang */
            border-color: #3949AB; /* Warna border */
        }

        /* Mengatur warna teks tombol primary */
        .btn-primary:hover {
            background-color: #283593; /* Warna latar belakang saat dihover */
            border-color: #283593; /* Warna border saat dihover */
        }

        /* Mengatur warna teks navbar */
        .navbar-default .navbar-brand,
        .navbar-default .navbar-nav>li>a {
            color: #FFFFFF; /* Warna teks */
        }

        /* Mengatur warna teks pada dropdown */
        .navbar-default .dropdown-menu>li>a {
            color: #000000; /* Warna teks */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{route('todo')}}">Aplikasi To-Do List</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="{{route('actionlogout')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{Auth::user()->email}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a>Level: {{Auth::user()->role}}</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <h2 class="text-center">Add Todo</h2>
                <form method="POST" action="{{ route('todos.store') }}" class="text-center">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Judul">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row todo-table">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">All Todos</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Dibuat pada</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter=1 @endphp
                        @foreach($todos as $todo)
                            <tr>
                                <th>{{$counter}}</th>
                                <td>{{$todo->title}}</td>
                                <td>{{$todo->created_at}}</td>
                                <td>
                                    @if($todo->is_completed)
                                        <div class="badge bg-success">Selesai</div>
                                    @else
                                        <div class="badge bg-warning">Belum Selesai</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('todos.destory', $todo->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php $counter++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
