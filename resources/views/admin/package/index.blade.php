@extends('layouts/admin')

@section('mainadmin')


    <a class="mt-4 btn btn-primary" href="{{route('package.create')}}">Them package</a>
    <table class="mt-4 table table-hover">
        <thead>
        <tr>
            <th  scope="col">Tên</th>
            <th  scope="col">Ảnh</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($packages as $item)
                    <tr>
                        <td>{{ $item->ten }}</td>
                        <td>{{ $item->anh }}</td>
                        <td><a href="{{route('package.edit',['package'=>$item->id])}}">Edit</a></td>
                        <td>
                            <form action="{{route('package.destroy',['package'=>$item->id])}}" method="post">
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