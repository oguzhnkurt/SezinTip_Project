@extends('layouts.default')

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Exam Details</h5>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label>Title:</label>
            <p>{{ $exam->title }}</p>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <p>{{ $exam->description }}</p>
        </div>
        <div class="form-group">
            <label>Date:</label>
            <p>{{ $exam->date }}</p>
        </div>
        <a href="{{ route('exams.index') }}" class="btn btn-default">Back</a>
    </div>
</div>
@endsection
