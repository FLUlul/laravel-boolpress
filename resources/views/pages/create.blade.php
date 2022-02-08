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
        <label for="category">Category</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}">{{$category -> type}}</option>
            @endforeach
        </select><br><br>

        <label for="tags">Tags</label><br>
        @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}">{{$tag -> type}}<br>
        @endforeach



        <br><input type="submit" value="Create"><br><br>
    </form>
@endsection