@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">Welcome, {{ Auth::user()->name }}!</p>

                    <div class="mb-4">
                        <h5>Your Account Details:</h5>
                        <ul class="list-unstyled">
                            <li><strong>User ID:</strong> {{ Auth::user()->id }}</li>
                            <li><strong>Role:</strong> {{ ucfirst(Auth::user()->role ?? 'N/A') }}</li>
                        </ul>
                    </div>

                    @if (Auth::user()->isAuthor() || Auth::user()->isAdmin())
                        <hr>
                        <h5 class="mt-4 mb-3">Your Created Books:</h5>

                        @if (Auth::user()->books->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Title (English)</th>
                                            <th>Author (English)</th>
                                            <th>Genre</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->books as $book)
                                            <tr>
                                                <td>{{ $book->title_english }}</td>
                                                <td>{{ $book->author_english }}</td>
                                                <td>{{ $book->genre }}</td>
                                                <td>
                                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm me-1">View</a>
                                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?');">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>You haven't created any books yet.</p>
                            @if (Auth::user()->isAuthor() || Auth::user()->isAdmin())
                                <a href="{{ route('books.create') }}" class="btn btn-success">Create New Book</a>
                            @endif
                        @endif
                    @endif

                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection