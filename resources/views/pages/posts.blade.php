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
                <div>{{$post -> publish_date}}</div>
                <div>{{$post -> author}}</div>
            </div>
            <div>Likes: <span class="likes">{{$post -> likes}}</span></div>
        </div>
    @endforeach


@endsection