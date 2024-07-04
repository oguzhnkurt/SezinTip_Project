@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schedule</h1>

    <a href="{{ route('schedule.create') }}" class="btn btn-primary">Add Schedule</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->title }}</td>
                <td>{{ $schedule->description }}</td>
                <td>{{ $schedule->date }}</td>
                <td>
                    <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
