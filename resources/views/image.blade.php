<h1>Upload File</h1>
<form action="/store" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"><br> <br>
    <button type="submit">Verstuur afbeelding</button>
</form>