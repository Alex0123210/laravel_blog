<div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{$post->title ?? ''}}"required> <!--здесь будем прописывать заголовок -->
</div>
<div class="form-group">
    <textarea name="text" rows="10" class="form-control" placeholder="Описание поста" required>{{$post->text ?? ''}}</textarea>
</div>
<div class="form-group">
    <input type="file" name="img">
</div>
