@extends('layouts/admin')

@push('my_scripts')
    <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}" type="text/css"/>
@endpush

@section('mainadmin')

    <form action="{{route('voucher.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>create voucher</h1>

        <div class="input-group mb-3">
            <span class="input-group-text">Voucher name</span>
            <input class="form-control" type="text" name="tenvoucher">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Voucher image</span>
            <input class="form-control" type="file" name="anh">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Voucher value</span>
            <input class="form-control" type="number" name="giatri">
        </div>


        @foreach($packages as $p)

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{$p->ten}}</span>
                    <div class="input-group-text">
                        <input type="checkbox" name="pack[{{$p->id}}][tile]" value="{{$p->id}}" aria-label="Checkbox for following text input">
                    </div>
                </div>
                <input type="text"  class="form-control" name="pack[{{$p->id}}][tile]" aria-label="Text input with checkbox">
            </div>

        @endforeach


        <button type="submit">submit</button>
    </form>


@endsection