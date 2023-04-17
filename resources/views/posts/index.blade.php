@extends('layouts.layout',['title'=>'Главная страница']) <!-- Подключаемся к шаблону layout.blade.php, задаем заголовок страницы-->
@section('content')

    @if (isset($_GET['search'])) <!--если что то есть с ключом search - выводим сообщение и проверяем было вообще что-то найдено или нет-->
        @if(count($posts)>0)
        <h2>По запросу поиска "<?=$_GET['search'] ?>"</h2>
        <p class="lead">Всего найдено {{count($posts)}} постов</p>
        @else
       <h2>По запросу "<?=$_GET['search'] ?>" ничего не найдено</h2>
        <a href="{{route('post.index')}}" class="btn-outline-primary">Отобразить все посты</a>
        @endif
    @endif

    <div class="row">
        @foreach($posts as $post)
        <div class="col-6">
            <div class="card">

                <div class="card-body">
                    <div class="card-header"><h2>{{$post->short_title}}</h2></div>
                    <div class="card-img" style="background-image: url({{{$post->img ?? asset('img/img.jpeg')}}}"></div>

                    <div class="card-user">{{$post->name}}</div>
                    <a href="{{route('post.show',['id'=>$post->post_id])}}" class="btn btn-outline-primary">Посмотреть пост</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (!isset($_GET['search'])) <!--если у нас не задан search - выводим пагинацию, если задан - выводим поиск -->
    {{$posts->links()}}
    @endif
@endsection

