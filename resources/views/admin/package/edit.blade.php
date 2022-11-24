
<form action="../update/{{ $package->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit package</h1>
    <input type="text" name="ten" value="{{ $package->ten }}">
    <input type="file" name="anh">
    <button type="submit">submit</button>
</form>