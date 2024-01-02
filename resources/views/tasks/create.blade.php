@extends('layouts.app')

<style>
    body {
        background-image: url('/images/fuji.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container {
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }

    /* Barre de Navigation */
    .navbar {
        background-color: transparent ;
        color: white;
    }

    .navbar-nav .nav-link:hover {
        color: white;
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }

    .navbar .btn-primary:hover {
        background-color: #ffffff;
        color: #007bff;
        border-color: #ffffff;
    }
</style>

@section('content')
<div class="container">
    <h1>New Task</h1>
    <form method="POST" action="/tasks">
        <div class="form-group" style="margin-bottom: 20px;">
            @csrf
            <label for="description">Task Description</label>
            <input class="form-control" type="text" name="description"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Task</button>
        </div>
    </form>
</div>
@endsection
