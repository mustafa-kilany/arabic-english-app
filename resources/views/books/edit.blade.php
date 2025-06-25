@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT') {{-- This correctly sets the HTTP method to PUT --}}

        @include('books.form', ['book' => $book])

        <button type="submit" class="btn btn-success mt-3">Update Book</button>
    </form>
</div>
@endsection