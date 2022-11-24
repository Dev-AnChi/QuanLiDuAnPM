
<form action="../update/{{ $user->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit user</h1>
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="email" name="email" value="{{ $user->email }}">
    <input type="password" name="password" value="{{ $user->password }}">
    <input type="number" name="soluotquay" value="{{ $user->soluotquay }}">
    <button type="submit">submit</button>
</form>