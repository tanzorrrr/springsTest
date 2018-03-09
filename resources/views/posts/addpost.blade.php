@section('title','|dashboard')
@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- Trigger the modal with a button -->
        <H1>Добавить запись</H1>
        <form  class="form-horizontal"action="{{route('admin.posts.store')}}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
            @include("posts.partials.form")
        </form>

    </div>
@endsection