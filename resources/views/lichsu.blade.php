@extends('layouts.master')
@push('styles')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endpush


@section('main')
    <div class="wrap">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Voucher</th>
                <th scope="col">Giá trị</th>
                <th scope="col">Thời Gian</th>
            </tr>
            </thead>
            <tbody>
                @foreach($user as $u)
                    <tr>
                        <th scope="row">{{$u->id}}</th>
                        <td>{{$u->tenvoucher}}</td>
                        <td>{{$u->giatri}}</td>
                        <td>{{$u->pivot->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="" style="display: flex; justify-content: center">
            {{ $user->links()}}
        </div>

    </div>
@endsection

