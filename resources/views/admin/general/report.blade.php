@extends('layouts/admin')


@section('mainadmin')



    <table class="mt-4 table table-hover">
        <tr>
            <th>Tên User</th>
            <th>Tên Voucher</th>
            <th>Giá Trị</th>
            <th>Ngày Quay trúng</th>
        </tr>
        @foreach($users as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->tenvoucher }}</td>
                <td>{{ $item->giatri }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach


    </table>
    <div class="" style="display: flex; justify-content: center">
        {{$users->links()}}
    </div>

@endsection

