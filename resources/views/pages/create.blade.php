@extends('layouts.main-layout')
@section('content')
<a href="{{route('home')}}" class="btn btn-primary">Home</a><br><br>

    <form action="{{route('store')}}" method="POST">

        @method('POST')
        @csrf

        <label for="title">Title</label><br>
        <input type="text" name="title"><br><br>
        <label for="subtitle">Subtitle</label><br>
        <input type="text" name="subtitle"><br><br>
        <label for="content">Content</label><br>
        <textarea name="content" cols="30" rows="10"></textarea><br><br>
        <label for="author">Author</label><br>
        <input type="text" name="author"><br><br>
        <label for="publish_date">Publish Date</label><br>
        <input type="date" name="publish_date"><br><br>
        <label for="likes">Likes</label><br>
        <input type="text" name="likes" value="0"><br><br>

        <input type="submit" value="Create">

    </form>
@endsection