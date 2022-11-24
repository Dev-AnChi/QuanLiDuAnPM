<a href="user/create">Them user</a>
<table>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>soluotquay</th>
    </tr>
    @foreach ($users as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->soluotquay }}</td>
                <td><a href="user/edit/{{ $item->id }}">Edit</a></td>
                <td>
                    <form action="user/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
    @endforeach
</table>
