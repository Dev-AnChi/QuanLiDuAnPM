<a href="miss/create">Them miss</a>
<table>
    <tr>
        <th>tennv</th>
        <th>chitietnv</th>
        <th>soluotdcnhan</th>
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
