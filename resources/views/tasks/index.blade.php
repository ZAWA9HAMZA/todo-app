@extends('layouts.app')

@section('content')
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
        background-color: transparent !important;
        color: white;
    }

    /* Style de survol pour les liens de la barre de navigation */
    .navbar-nav .nav-link:hover {
        color: white;
        transform: scale(1.1); /* Agrandir légèrement au survol */
        transition: transform 0.3s ease-in-out; /* Ajouter une transition fluide */
    }

    /* Style de survol pour le bouton de création de nouvelle tâche */
    .navbar .btn-primary:hover {
        background-color: #ffffff; /* Couleur de fond au survol (blanc) */
        color: #007bff; /* Couleur du texte au survol (bleu) */
        border-color: #ffffff; /* Couleur de la bordure au survol (blanc) */
    }

    /* Ajoutez d'autres styles au besoin */
</style>

<div class="container">
    <h1>Task List</h1>
</div>

@foreach($tasks as $task)
    <div class="card mb-3">
        <div class="card-body @if(in_array($task->id, session('completed_tasks', []))) border-success @endif">
            <p><b>Title: </b>{{ $task->description }}</p>

            <p><b>Created at: </b>{{ $task->created_at->format('d/m/y H:i') }}</p>

            @if(in_array($task->id, session('completed_tasks', [])))
                <p class="text-success">Completed with success</p>
            @endif

            <form action="/tasks/{{ $task->id }}" method="POST" class="complete-form">
                @csrf
                @method('PATCH')
                <button class="btn btn-light btn-block complete-btn" type="submit" data-task-id="{{ $task->id }}">Complete</button>
            </form>

            <form action="/tasks/{{ $task->id }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-block delete-btn" type="submit" data-task-id="{{ $task->id }}">Delete</button>
            </form>
        </div>
    </div>
@endforeach

<a href="/tasks/create" class="btn btn-primary btn-lg">New Task</a>

@if(session('status'))
    <div class="alert alert-success mt-3">
        {{ session('status') }}
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // SweetAlert for Complete
        document.querySelectorAll('.complete-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var taskId = form.querySelector('.complete-btn').getAttribute('data-task-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to mark this task as completed',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, complete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire('Completed!', 'The task has been marked as completed.', 'success');
                    }
                });
            });
        });

        // SweetAlert for Delete
        document.querySelectorAll('.delete-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var taskId = form.querySelector('.delete-btn').getAttribute('data-task-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire('Deleted!', 'The task has been deleted.', 'success');
                    }
                });
            });
        });
    });
</script>

@endsection
