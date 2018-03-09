@section('title','|dashboard')
@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- Trigger the modal with a button -->
        <h1>Редактировать запись</h1>
        <form  class="form-horizontal" action="{{route('admin.posts.update',$post->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
            @include("posts.partials.form2")
        </form>

    </div>
@endsection