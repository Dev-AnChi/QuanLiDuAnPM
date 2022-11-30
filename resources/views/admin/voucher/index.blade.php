@extends('layouts/admin')

@section('mainadmin')

    <a class="mt-4 btn btn-primary" href="{{route('voucher.create')}}">Them voucher</a>
    <table class="mt-4 table table-hover">
        <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Giá Trị</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vouchers as $item)
            <tr>
                <td >{{ $item->tenvoucher }}</td>
                <td>{{ $item->anh }}</td>
                <td>{{ $item->giatri }}</td>
                <td><a href="{{route('voucher.edit',['voucher'=>$item->id])}}">Edit</a></td>
                <td>
                    <form action="{{route('voucher.destroy',['voucher'=>$item->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection