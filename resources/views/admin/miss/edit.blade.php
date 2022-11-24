
<form action="../update/{{ $miss->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit miss</h1>
    <input type="text" name="tennv" value="{{ $miss->tennv }}">
    <input type="text" name="chitietnv" value="{{ $miss->chitietnv }}">
    <input type="number" name="soluotdcnhan" value="{{ $miss->soluotdcnhan }}">
    <button type="submit">submit</button>
</form>