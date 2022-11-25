@extends('layouts/admin')

@section('mainadmin')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:nth-child(even) {background-color: #f2f2f2;}

    tr:hover {background-color: coral;}

</style>

<a href="miss/create">Them miss</a>
<h2>User y đã hoàn thành</h2>
<table>
    <tr>
        <th>Tên Nhiệm vụ</th>
        <th>Chi Tiết Nhiệm Vụ</th>
        <th>Số lượt Quay</th>
    </tr>
    <tr>
        <td>Điểm danh</td>
        <td>Điểm danh ngày 25/11/2022</td>
        <td>2</td>
    </tr>
    @foreach ($misss as $item)
            <tr>
                <td>{{ $item->tennv }}</td>
                <td>{{ $item->chitietnv }}</td>
                <td>{{ $item->soluotdcnhan }}</td>
                <td><a href="miss/edit/{{ $item->id }}">Edit</a></td>
                <td>
                    <form action="miss/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
    @endforeach
</table>

@endsection
