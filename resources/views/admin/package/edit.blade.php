@extends('layouts/admin')

@push('my_scripts')
    <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}" type="text/css"/>
@endpush

@section('mainadmin')

<form action="{{route('package.update',['package'=>$package->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit package</h1>

    <div class="input-group mb-3">
        <span class="input-group-text" >Package Name</span>
        <input class="form-control" type="text" name="ten" value="{{ $package->ten }}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" >Package Name</span>
        <input class="form-control" type="file" name="anh">
    </div>



    <details class="mb-4">
        <summary>Edit voucher own package</summary>

        @foreach($package->vouchers as $v)
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{$v->tenvoucher}}</span>
                    <div class="input-group-text">
                        <input class="mycheck"   checked type="checkbox" name="pack[{{$v->id}}][tile]" value="{{$v->id}}" aria-label="Checkbox for following text input">
                    </div>
                </div>
                <input  type="text" class="form-control myinput"  value="{{$v->pivot->tile ?? ''}}" name="pack[{{$v->id}}][tile]" aria-label="Text input with checkbox">
            </div>
        @endforeach

    </details>

    <select id="example-getting-started" multiple="multiple">

        @foreach($all_voucher_except as $v)

            <option value="{{$v->id}}">{{$v->tenvoucher}}</option>

        @endforeach
    </select>

    <button class="mb-4" type="submit">submit</button>


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
                enableFiltering: true,
                maxHeight: 400,
                dropUp: true,
            }
        );
    });
    let mycheck = document.getElementsByClassName('mycheck');
    let myinput = document.getElementsByClassName('myinput');

    let ovalue = Array.from(myinput).map(e => e.value);

    for (let i = 0 ; i < mycheck.length; i++)
    {
        mycheck[i].addEventListener('change',function (){
            console.log(this.checked);
            if (!this.checked)
            {
                myinput[i].value = "";
                myinput[i].readOnly = true;
            }
            else
            {
                myinput[i].value = ovalue[i];
                myinput[i].readOnly = false;
            }
        })
    }
</script>


@endsection