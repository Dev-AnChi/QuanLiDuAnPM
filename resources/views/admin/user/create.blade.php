@extends('layouts/admin')

@section('mainadmin')

    <form action="store" method="post" enctype="multipart/form-data">
        @csrf
        <h1>create user</h1>
        <input class="form-control mt-4 " type="text" name="name" placeholder="name user" aria-label="default input example">
        <div class="mb-3 row mt-4 ">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control-plaintext" id="staticEmail" value="email@example.com">
            </div>
        </div>

        <div class="mb-3 row mt-4 ">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
        </div>
        <input class="form-control mt-4 " name="soluotquay" type="text" placeholder="name user" aria-label="default input example">
        <button type="submit" class="mt-4  btn btn-primary">submit</button>
    </form>

@endsection

