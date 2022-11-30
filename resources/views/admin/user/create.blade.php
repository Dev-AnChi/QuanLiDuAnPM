@extends('layouts/admin')

@section('mainadmin')

    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>create user</h1>
        <div class="input-group mb-3">
            <span class="input-group-text" >User name</span>
            <input class="form-control" type="text" required name="name" placeholder="">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" >User email</span>
            <input class="form-control" type="email" required name="email" placeholder="">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" >User password</span>
            <input class="form-control" type="password" required name="password" placeholder="">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" >soluotquay</span>
            <input class="form-control" type="number" required name="soluotquay" placeholder="">
        </div>

        <button type="submit" class="mt-4  btn btn-primary">submit</button>
    </form>

@endsection

