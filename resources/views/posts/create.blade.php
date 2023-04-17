@extends('layouts.layout',['title'=>'Создать новую запись'])
@section('content') <!-- связываем вьюшки с шаблоном-->

<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf <!-- добавление встроенной защиты от csrf, вставится input с типом hidden в который будет записываться токен верификации, мы это отправляем или злоумышлинник-->
    <h3>Создать пост</h3>
    @include('posts.parts.form')
    <input type="submit" value="Создать пост" class="btn btn-outline-success">
</form>

@endsection

