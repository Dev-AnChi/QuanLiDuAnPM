<a href="package/create">Them package</a>
<table>
    <tr>
        <th>ten</th>
        <th>anh</th>
    </tr>
    @foreach ($packages as $item)
            <tr>
                <td>{{ $item->ten }}</td>
                <td>{{ $item->anh }}</td>
                <td><a href="package/edit/{{ $item->id }}">Edit</a></td>
                <td>
                    <form action="package/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
    @endforeach
</table>
