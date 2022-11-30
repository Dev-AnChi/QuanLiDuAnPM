@extends('layouts/admin')

@section('mainadmin')

<form action="{{route('voucher.update',['voucher'=>$voucher->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>edit voucher</h1>

    <div class="input-group mb-3">
        <span class="input-group-text" >Voucher Name</span>
        <input required class="form-control" type="text" name="tenvoucher" value="{{ $voucher->tenvoucher }}">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" >Voucher Image</span>
        <input class="form-control" type="file" name="anh">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" >Voucher value</span>
        <input required class="form-control" type="text" name="giatri" value="{{ $voucher->giatri }}">
    </div>


    @foreach($voucher->packages  as $v)

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">{{$v->ten}}</span>
                <div class="input-group-text">
                    <input class="mycheck"  checked type="checkbox" name="pack[{{$v->id}}][tile]" value="{{$v->id}}" aria-label="Checkbox for following text input">
                </div>
            </div>
            <input  type="text" class="form-control myinput"  value="{{$v->pivot->tile}}" name="pack[{{$v->id}}][tile]" aria-label="Text input with checkbox">
        </div>

    @endforeach

    <details class="mb-4">
        <summary>Add other packages</summary>
    @foreach($all_pac_except as $v)

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">{{$v->ten}}</span>
                <div class="input-group-text">
                    <input class="mycheck"   type="checkbox" name="pack[{{$v->id}}][tile]" value="{{$v->id}}" aria-label="Checkbox for following text input">
                </div>
            </div>
            <input  type="text" readonly class="form-control myinput"  value="" name="pack[{{$v->id}}][tile]" aria-label="Text input with checkbox">
        </div>

    @endforeach
    </details>
    <button type="submit">submit</button>
</form>

<script >
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