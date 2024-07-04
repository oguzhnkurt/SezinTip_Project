@extends('layouts.default')

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Exams</h5>
        <div class="heading-elements">
            <a href="{{ route('exams.create') }}" class="btn btn-primary">Create Exam</a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table datatable-basic">
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
                @foreach($exams as $exam)
                <tr>
                    <td>{{ $exam->id }}</td>
                    <td>{{ $exam->title }}</td>
                    <td>{{ $exam->description }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>
                        <a href="{{ route('exams.show', $exam->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display:inline;">
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
</div>
@endsection
