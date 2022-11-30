@extends('layouts/admin')

@push('my_scripts')
    <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}" type="text/css"/>
@endpush

@section('mainadmin')

<form action="{{route('miss.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>create miss</h1>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text">Miss name</span>
        <input required class="form-control" type="text" name="tennv">
    </div>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text">Miss Detail</span>
        <input required class="form-control"  name="chitietnv">
    </div>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text">Value</span>
        <input required class="form-control"  name="soluotdcnhan">
    </div>


    <button type="submit">submit</button>
</form>

@endsection