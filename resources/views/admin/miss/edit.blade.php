@extends('layouts/admin')

@push('my_scripts')

@endpush

@section('mainadmin')

<form action="{{route('miss.update',['miss'=>$miss->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit miss</h1>
    <div class="input-group mb-3">
        <span class="input-group-text" >Package Name</span>
        <input class="form-control" type="text" name="tennv" value="{{ $miss->tennv }}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" >Package Name</span>
        <input class="form-control" type="text" name="chitietnv" value="{{ $miss->chitietnv }}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" >Package Name</span>
        <input class="form-control" type="number" name="soluotdcnhan" value="{{ $miss->soluotdcnhan }}">
    </div>


    <button type="submit">submit</button>
</form>

@endsection