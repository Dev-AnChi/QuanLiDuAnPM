@extends('layouts.master')
@push('styles')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endpush

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

@endpush

@section('main')

    <div class="wrap">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Tên nhiệm vụ</th>
                <th scope="col">Miêu tả</th>
                <th scope="col">Số lượt quay</th>
            </tr>
            </thead>
            <tbody>
            @foreach($miss as $m)
                <tr>
                    <td>{{$m->tennv}}</td>
                    <td>{{$m->chitietnv}}</td>
                    <td>{{$m->soluotdcnhan}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

