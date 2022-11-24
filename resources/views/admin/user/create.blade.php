<form action="store" method="post" enctype="multipart/form-data">
    @csrf
    <h1>create user</h1>
    <input type="text" name="name">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="number" name="soluotquay">
    <button type="submit">submit</button>
</form>