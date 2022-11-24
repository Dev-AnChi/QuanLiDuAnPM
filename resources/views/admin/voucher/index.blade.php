<a href="voucher/create">Them voucher</a>
<table>
    <tr>
        <th>ten</th>
        <th>anh</th>
        <th>giatri</th>
    </tr>
    @foreach ($vouchers as $item)
            <tr>
                <td>{{ $item->tenvoucher }}</td>
                <td>{{ $item->anh }}</td>
                <td>{{ $item->giatri }}</td>
                <td><a href="voucher/edit/{{ $item->id }}">Edit</a></td>
                <td>
                    <form action="voucher/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
    @endforeach
</table>
