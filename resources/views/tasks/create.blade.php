@extends('layouts.app')

@section('content')
<h2>Add a New Task</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Task Title:</label>
        <input type="text" name="title" id="title" class="form-control" required maxlength="255">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Task</button>
    </div>
</form>

@endsection
