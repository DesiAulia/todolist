<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

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

    </style>
    <title>Edit Task</title>

</head>
<body>
    


<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
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
    </div>
</div>

<div class="text-center mt-5">
    <h2>Edit Todo</h2>
</div>

<form  method="POST" action="{{route('todos.update', $todo->id)}}">

    @csrf

    {{ method_field('PUT') }}

    <div class="row justify-content-center mt-5">

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" placeholder="Judul" value="{{$todo->title}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_completed" id="" class="form-control">
                    <option value="1" @if($todo->is_completed==1) selected @endif>Selesai</option>
                    <option value="0" @if($todo->is_completed==0) selected @endif>Belum Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
