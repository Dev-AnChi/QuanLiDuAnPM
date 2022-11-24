
<form action="../update/{{ $voucher->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit voucher</h1>
    <input type="text" name="tenvoucher" value="{{ $voucher->tenvoucher }}">
    <input type="file" name="anh">
    <input type="number" name="giatri" value="{{ $voucher->giatri }}">
    <button type="submit">submit</button>
</form>