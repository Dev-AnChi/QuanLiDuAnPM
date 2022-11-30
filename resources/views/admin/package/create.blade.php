@extends('layouts/admin')

@push('my_scripts')
    <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}" type="text/css"/>
@endpush

@section('mainadmin')

    <form action="{{route('package.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>create package</h1>

        <div class="input-group mt-4 mb-3">
            <span class="input-group-text">Package name</span>
            <input required class="form-control" type="text" name="ten">
        </div>

        <div class="input-group mt-4 mb-3">
            <span class="input-group-text">Package image</span>
            <input required class="form-control" type="file" name="anh">
        </div>

        <select id="example-getting-started" multiple="multiple">

            @foreach($vouchers as $v)
                <option value="{{$v->id}}">{{$v->tenvoucher}}</option>
            @endforeach

        </select>

        <button type="submit" class="mb-4">submit</button>
    </form>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-getting-started').multiselect(
                {
                    checkboxName: function(option) {
                        return 'multiselect[]';
                    },
                    selectAllName: 'select-all-name',
                    includeSelectAllOption: true,
                    enableFiltering: true
                }
            );
        });
    </script>
@endsection