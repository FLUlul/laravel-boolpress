@extends('layouts.main-layout')
@section('content')
<a href="{{route('home')}}" class="btn btn-primary">Home</a><br><br>
<a href="{{route('posts')}}" class="btn btn-secondary">Posts</a><br><br>

    <form action="{{route('update', $post -> id)}}" method="POST">

        @method('POST')
        @csrf

        <label for="title">Title</label><br>
        <input type="text" name="title" value="{{$post -> title}}"><br><br>

        <label for="subtitle">Subtitle</label><br>
        <input type="text" name="subtitle" value="{{$post -> subtitle}}"><br><br>

        <label for="content">Content</label><br>
        <textarea name="content" cols="30" rows="10">{{$post -> content}}</textarea><br><br>

        <label for="category">Category</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}"
                    
                    {{-- per selezionare le category gia presenti --}}
                    @if ($category -> id == $post -> category -> id)
                        selected
                    @endif   

                >{{$category -> type}}</option>
            @endforeach
        </select><br><br>

        <label for="tags">Tags</label><br>
        @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}"

            {{-- per spuntare i tags gia presenti --}}
            @foreach ($post -> tags as $postTag)
                @if ($tag -> id == $postTag -> id)
                    checked
                @endif
            @endforeach
        
        >{{$tag -> type}}<br>
        @endforeach

        <br><input type="submit" value="Edit"><br><br>
    </form>
@endsection