@extends('layouts/admin')

@section('mainadmin')

<a class="mt-4 btn btn-primary" href="{{route('miss.create')}}">Them miss</a>

<table class="mt-4 table table-hover">
    <tr>
        <th>Tên Nhiệm vụ</th>
        <th>Chi Tiết Nhiệm Vụ</th>
        <th>Số lượt Quay</th>
    </tr>
    @foreach ($misss as $item)
            <tr>
                <td>{{ $item->tennv }}</td>
                <td>{{ $item->chitietnv }}</td>
                <td>{{ $item->soluotdcnhan }}</td>
                <td><a href="{{route('miss.edit',['miss'=>$item->id])}}">Edit</a></td>
                <td>
                    <form action="{{route('miss.destroy',['miss'=>$item->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
    @endforeach
</table>

@endsection
