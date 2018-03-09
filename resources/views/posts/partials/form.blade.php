


<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок страницы" value="{{$post->title or ""}}" required>

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$post->slug or ""}}" readonly="">



<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="text">{{$post->text or ""}}</textarea>

<label for="">Автора</label>
<select name="autors[]" id="" class="form-control select2-multi" multiple="multiple">

    @foreach($autors as $autor)

    <option value="{{$autor->id}}">{{$autor->name}}</option>
        @endforeach
</select>


<input class="btn btn-primary" type="submit" value="Сохранить">

