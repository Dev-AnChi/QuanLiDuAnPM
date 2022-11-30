@extends('layouts.master')
@push('styles')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

@endpush

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endpush


@section('main')
    <div class="wrap">
        @foreach($pac as $p)
            <div class="card" style="width: 18rem;" onclick="window.location = '{{route('vaoquay',['id'=>$p->id])}}'" >
                <img class="card-img-top" src="/images/{{$p->anh}}" style="object-fit: contain;" alt="Card image cap" width="100" height="100">
                <div class="card-body" >
                    <h3 style="font-size: 25px; font-weight: 600"  class="card-title">{{$p->ten}}</h3>
                    <p class="card-text">
                        @foreach($p->vouchers as $v)
                            {{ $v->tenvoucher . " tỉ lệ " .$v->pivot->tile.'%'}} <br>
                        @endforeach
                    </p>
                </div>
            </div>
        @endforeach
    </div>


@endsection

