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

        <input type="submit" value="Create">

    </form>
@endsection