@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') Sezin Akademi @endslot
@slot('subtitle') Eğitim Takvimi @endslot
@endcomponent

<!-- Content area -->
<div class="content">

    <!-- Eğitim Takvimi -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Eğitim Tarihleri</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.schedule.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    Sezin Akademi Öğrenmeyi zaman ve mekanla sınırlı tutmayan, eğitimin her zaman,
                    her yerde, devamlı olmasının önemini biliyor, İnovasyon ve Gelişim Akademisi çatısı altında tüm personellerimizin gelişimine hem örgün hem uzaktan eğitimlerimizle değer katıyoruz.
                    <br><br>
                    <code>ÖNEMLİ UYARI: Eğitim linki dersten 5 dakika önce "Link" kısmında gözükecektir.</code>
                </div>

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
                            <tr>
                                <td>Pazartesi</td>
                                <td>
                                    <input type="text" name="monday_time" class="form-control" value="{{ $schedule->monday_time ?? '17:30 - 18:45' }}">
                                </td>
                                <td>
                                    <input type="text" name="monday_link" class="form-control" value="{{ $schedule->monday_link ?? '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Salı</td>
                                <td>
                                    <input type="text" name="tuesday_time" class="form-control" value="{{ $schedule->tuesday_time ?? '16:45 - 17:30' }}">
                                </td>
                                <td>
                                    <input type="text" name="tuesday_link" class="form-control" value="{{ $schedule->tuesday_link ?? '' }}">
                                </td>
                            </tr>
                            <!-- Diğer günler için de benzer satırlar ekleyin -->
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

</div>
<!-- /content area -->
@endsection
