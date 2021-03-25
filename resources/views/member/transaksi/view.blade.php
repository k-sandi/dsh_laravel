<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Sewa Buku</title>
    <!-- <a href="{{route('admin.book.add')}}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Tambah Data </a> -->
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Book Name</th>
            <th>Book Price</th>
            <th>Action</th>
        </thead>
        </tr>
        <tbody>
        @foreach($book as $b)
            <tr>
            <td>{{$b->book_name}}</td>
            <td>{{$b->book_price}}</td>
            <td>
                {{-- <a href="{{ route('admin.book.edit', $b->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i> </a> --}}
                <a href="{{route('member.trs.add', $b->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i>Rent </a>
                {{-- <a href="{{ route('admin.book.delete', $b->id) }}" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a> --}}
                {{--<a href="{{route('admin.book.destroy', $b->id)}}" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete </a>--}}
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>