@extends('layouts.app')

@section('content')

    <div class="container">


        <hr>

        <a href="{{URL::to('posts/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Добавить статью</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td class="text-right">
                        <a href="{{URL::to('posts/'.$post->id)}}" class="btn btn-success">Посмотреть</a>
                        <a href="{{URL::to('posts/'.$post->id.'/edit')}}" class="btn btn-default">Редактировать</a>
                        {{--<a href="{{URL::to('posts/delete',$post->id)}}" class="btn btn-danger">Удалть</a>--}}
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.posts.destroy', $post->id],'style'=>'display:inline']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">

                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection