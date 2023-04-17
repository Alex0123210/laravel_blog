<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
</head>
<body>
<nav class="container navbar navbar-expand-lg bg-body-tertiary">
    <ul class="container-fluid col-6">
        <li class="nav-item active">
        <a class="nav link" href="/">Главная<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav link" href="{{route('post.create')}}">Создать пост<span class="sr-only">(current)</span></a>
        </li>
    </ul>
            <form class="d-flex" action="{{route('post.index')}}" role="search">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Найти пост" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
</nav>

<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @yield('content') <!-- здесь вставляем динамические элементы, а сверху html - это шаблон -->
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
