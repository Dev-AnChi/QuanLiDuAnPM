<form action="store" method="post" enctype="multipart/form-data">
    @csrf
    <h1>create package</h1>
    <input type="text" name="ten">
    <input type="file" name="anh">
    <button type="submit">submit</button>
</form>