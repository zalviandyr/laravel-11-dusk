@extends('app')

@section('content')
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 24rem;">
      <h4 class="text-center mb-4">Edit Book</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('book.update', $book) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
          <label for="synopsis" class="form-label">Synopsis</label>
          <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required>{{ old('synopsis', $book->synopsis) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="author_id" class="form-label">Author</label>
          <select class="form-control" id="author_id" name="author_id">
            <option value="" selected disabled></option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" @if ($user->id == $book->author_id) selected @endif>{{ $user->name }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Save</button>
      </form>
    </div>
  </div>
@endsection
