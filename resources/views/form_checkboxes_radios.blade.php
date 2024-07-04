@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') Admin Paneli @endslot
@slot('subtitle') Video İçerik Yönetimi @endslot
@endcomponent

<!-- İçerik Alanı -->
<div class="content">

    <!-- Video Yükleme -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Video Yükleme</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('videos.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="videoTitle" class="form-label">Video Başlığı</label>
                    <input type="text" class="form-control" id="videoTitle" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="videoFile" class="form-label">Video Dosyası</label>
                    <input type="file" class="form-control" id="videoFile" name="video" accept="video/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Yükle</button>
            </form>
        </div>
    </div>

    <!-- Yüklenen Videolar -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Yüklenen Videolar</h5>
        </div>

        <div class="card-body">
            <div class="list-group">
                @foreach ($videos as $video)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{ $video->title }}</h6>
                            <div>
                                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $video->id }}">Düzenle</button>
                                <form action="{{ route('videos.delete', $video->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                </form>
                            </div>
                        </div>
                        <video width="100%" controls>
                            <source src="{{ asset('storage/videos/' . $video->filename) }}" type="video/mp4">
                            Tarayıcınız video etiketini desteklemiyor.
                        </video>
                    </div>

                    <!-- Düzenleme Modal -->
                    <div class="modal fade" id="editModal{{ $video->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $video->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $video->id }}">Videoyu Düzenle</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="videoTitle{{ $video->id }}" class="form-label">Video Başlığı</label>
                                            <input type="text" class="form-control" id="videoTitle{{ $video->id }}" name="title" value="{{ $video->title }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="videoFile{{ $video->id }}" class="form-label">Yeni Video Dosyası (İsteğe Bağlı)</label>
                                            <input type="file" class="form-control" id="videoFile{{ $video->id }}" name="video" accept="video/*">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
