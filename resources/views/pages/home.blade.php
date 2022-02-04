@extends('layouts.main-layout')
@section('content')

@auth
<h2>Welcome {{Auth::user() -> name}}</h2>
<a href="{{route('logout')}}" class="btn btn-secondary">Logout</a>
<a href="{{route('posts')}}" class="btn btn-primary">Posts</a>

@else
    <h2>Login or Register</h2>
@endauth
@guest
    <nav>
        <h2>Login</h2>

        <form action="{{route('login')}}" method="POST">

            @method('POST')
            @csrf

            <label for="email">Email</label><br>
            <input type="email" name="email"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password"><br>

            <input type="submit" value="Login">
        </form>
    </nav>
    <nav>
        <h2>Register</h2>

        <form action="{{route('register')}}" method="POST">

            @method('POST')
            @csrf
            
            <label for="name">Name</label><br>
            <input type="text" name="name"><br>
            <label for="email">Email</label><br>
            <input type="email" name="email"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password"><br>
            <label for="password_confirmation">Password Confirmation</label><br>
            <input type="password" name="password_confirmation"><br>

            <input type="submit" value="Register">
        </form>
    </nav>
@endguest

@endsection