@extends('layouts.app')

@section('title', $book->title_english . ' - Book Details')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $book->title_english }} ({{ $book->title_arabic }})</h4>
                    <div>
                        @can('update', $book)
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-light me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        @endcan

                        @can('delete', $book)
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this book?');">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                        @endcan

                        <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-light ms-2">
                            <i class="fas fa-arrow-left"></i> Back to Books
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Author (English):</strong> {{ $book->author_english }}
                        </div>
                        <div class="col-md-6 text-end">
                            <strong>Author (Arabic):</strong> {{ $book->author_arabic }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <strong>Description (English):</strong>
                        <p>{{ $book->description_english ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-3 text-end">
                        <strong>Description (Arabic):</strong>
                        <p>{{ $book->description_arabic ?? 'N/A' }}</p>
                    </div>

                    <hr>

                    <div class="row mb-2">
                        <div class="col-md-4"><strong>Genre:</strong> {{ $book->genre }}</div>
                        <div class="col-md-4"><strong>Language:</strong> {{ ucfirst($book->language) }}</div>
                        <div class="col-md-4"><strong>Pages:</strong> {{ $book->pages }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Publication Year:</strong> {{ $book->publication_year }}</div>
                        <div class="col-md-6"><strong>ISBN:</strong> {{ $book->isbn }}</div>
                    </div>

                    @if ($book->user)
                    <div class="row mt-4">
                        <div class="col-12 text-muted">
                            <small>Added by: {{ $book->user->name ?? 'Unknown' }} on {{ $book->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection