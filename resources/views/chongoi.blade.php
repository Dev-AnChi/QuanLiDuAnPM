@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

