@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <a href="{{URL::to('posts')}}"class="btn btn-info">Назад к списку статей</a>
            <h1>{{$post->title}}</h1>
            <p>{{$post->text}}</p>
            <h3>Автора</h3>
            <p>

                @foreach($post->users as $autor)
                    <span class="label label-primary">{{$autor->name}}</span>
                    @endforeach
            </p>
        </div>



    </div>

@endsection