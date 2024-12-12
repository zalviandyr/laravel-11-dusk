@extends('app')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <h1>List Book</h1>
    <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Add Book</a>

    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Synopsis</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
          <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->synopsis }}</td>
            <td>{{ $book->created_at }}</td>
            <td>
              <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>

              <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
