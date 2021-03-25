<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
</head>
<body>
    <div class="container-fluid">
        <form action="{{route('admin.book.update', $book->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="row mt-3">
                <h1 class="mt-4 mb-3">Edit Data Buku</h1>
                <div class="row">
                    <label>Nama Buku</label>
                    <div class="form-control">
                        <input type="text" name="book_name" class="form-control" value="{{$book->book_name}}">
                    </div>
                </div>
                <div class="row">
                    <label>Harga Buku</label>
                    <div class="form-control">
                        <input type="number" name="book_price" class="form-control" value="{{$book->book_price}}">
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-outline-primary py-2 px-4">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>