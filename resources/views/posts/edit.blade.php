@extends('layouts.layout',['title'=>'Редактор записи'])
@section('content') <!-- связываем вьюшки с шаблоном-->

<form action="{{route('post.update', ['id'=>$post->post_id])}}" method="post" enctype="multipart/form-data">
    @csrf <!-- добавление встроенной защиты от csrf, вставится input с типом hidden в который будет записываться токен верификации, мы это отправляем или злоумышлинник-->
    @method('PATCH')
    <h3>Редактировать пост</h3>
    @include('posts.parts.form')
    <input type="submit" value="Сохранить изменения" class="btn btn-outline-success">
</form>

@endsection

