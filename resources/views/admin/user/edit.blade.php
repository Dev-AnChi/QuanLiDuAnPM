@extends('layouts/admin')

@section('mainadmin')

<form action="{{route('user.update',['user'=>$user->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit user</h1>
    <div class="input-group mb-3">
        <span class="input-group-text" >User Name</span>
        <input class="form-control" type="text" name="name" value="{{ $user->name }} ">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" >User email</span>
        <input class="form-control " type="email" name="email" value="{{ $user->email }}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" >User password</span>
        <input class="form-control " type="password" name="password" value="{{ $user->password }}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" >User số lượt quay</span>
        <input class="form-control " type="number" name="soluotquay" value="{{ $user->soluotquay }}">
    </div>

    <button  type="submit">Thay đổi</button>

</form>


@endsection