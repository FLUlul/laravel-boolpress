@extends('layouts.main-layout')
@section('content')
<a href="{{route('home')}}" class="btn btn-secondary">Home</a><br><br>
<a href="{{route('create')}}" class="btn btn-primary">Create</a>

    <h1>Posts list:</h1>

    @foreach ($posts as $post)
        <div class="post">
            <h2>{{$post -> title}}</h2>
            <h4>{{$post -> subtitle}}</h4>
            <p>{{$post -> content}}</p>

            <div class="date-auth">
                <div>{{$post -> created_at -> format('d/m/Y H:i')}}</div>
                <div>{{$post -> author}}</div>
            </div>

            <div class="date-auth">
                <div>Category: {{$post -> category -> type}}</div>

                <div>
                    @if (count($post -> tags))
                        Tags:
                        @foreach ($post -> tags as $tag)
                            
                            - <a class="tags">{{$tag -> type}}</a> -

                        @endforeach
                    @endif
                </div>
            </div>
            
            <div>Likes: <span class="likes">{{$post -> likes}}</span></div>

            <br><a href="{{route ('edit', $post -> id)}}" class="btn btn-secondary">Edit</a><br>
            <br><a href="{{route ('delete', $post -> id)}}" class="btn btn-danger">Delete</a><br><br>
        </div>
    @endforeach


@endsection