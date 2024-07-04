<!-- resources/views/success_certificate.blade.php -->

<form method="POST" action="{{ route('store.certificate') }}">
    @csrf
    <label for="name">İsim:</label><br>
    <input type="text" id="name" name="name"><br>
    <button type="submit">Sertifika Oluştur</button>
</form>
