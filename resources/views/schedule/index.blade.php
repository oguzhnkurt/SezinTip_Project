@extends('layouts.master')

@section('content')
    @component('components.breadcrumb')
        @slot('title') Sezin Akademi @endslot
        @slot('subtitle') Eğitim Takvimi @endslot
    @endcomponent

    <!-- Eğitim Takvimi -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Eğitim Tarihleri</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.schedule.update', ['id' => $schedule->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Eğitim takvimi tablosu -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Gün</th>
                                <th>Saat</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->day }}</td>
                                <td>
                                    <input type="text" name="time" class="form-control" value="{{ $schedule->time }}">
                                </td>
                                <td>
                                    <input type="text" name="link" class="form-control" value="{{ $schedule->link }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Eğitim Takvimi -->
@endsection
