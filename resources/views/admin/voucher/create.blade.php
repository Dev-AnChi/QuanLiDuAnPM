<form action="store" method="post" enctype="multipart/form-data">
    @csrf
    <h1>create voucher</h1>
    <input type="text" name="tenvoucher">
    <input type="file" name="anh">
    <input type="number" name="giatri">
    <button type="submit">submit</button>
</form>