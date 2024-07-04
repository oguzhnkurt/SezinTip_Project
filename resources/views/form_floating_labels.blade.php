<!-- resources/views/failure_report.blade.php -->

<form method="POST" action="{{ route('store.report') }}">
    @csrf
    <label for="description">Başarısızlık Nedeni:</label><br>
    <textarea id="description" name="description"></textarea><br>
    <button type="submit">Rapor Gönder</button>
</form>
