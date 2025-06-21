@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Books</h2>

    @php $user = Auth::user(); @endphp

    <!-- Search Form -->
    <form action="{{ route('books.index') }}" method="GET" class="mb-4 d-flex" style="gap: 10px;">
        <input type="text" name="search" class="form-control" placeholder="Search by title, author, or genre..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary">Search</button>
    </form>

    @if($user->isAdmin() || $user->isAuthor())
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($books->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title (EN)</th>
                <th>Title (AR)</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Language</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title_english }}</td>
                <td>{{ $book->title_arabic }}</td>
                <td>{{ $book->author_english }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->language }}</td>
                <td>
                    @if($user->isAdmin() || ($user->isAuthor() && $book->user_id === $user->id))
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this book?')">Delete</button>
                        </form>
                    @else
                        <span class="text-muted">No actions</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No books found.</p>
    @endif
</div>
@endsection
