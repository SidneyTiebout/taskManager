@extends('layouts.app')

@section('content')
<h2>Tasks</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $taskId => $task)
            <tr>
                <td>{{ $task['title'] }}</td>
                <td>
                    @if($task['completed'])
                        <span class="badge badge-success">Completed</span>
                    @else
                        <span class="badge badge-warning">Incomplete</span>
                    @endif
                </td>
                <td>
                    @if(!$task['completed'])
                        <form action="{{ route('tasks.complete', $taskId) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Mark as completed</button>
                        </form>
                    @endif
                    <form action="{{ route('tasks.delete', $taskId) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
