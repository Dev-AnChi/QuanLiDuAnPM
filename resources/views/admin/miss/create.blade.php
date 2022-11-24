<form action="store" method="post" enctype="multipart/form-data">
    @csrf
    <h1>create miss</h1>
    <input type="text" name="tennv">
    <input type="text" name="chitietnv">
    <input type="number" name="soluotdcnhan">
    <button type="submit">submit</button>
</form>