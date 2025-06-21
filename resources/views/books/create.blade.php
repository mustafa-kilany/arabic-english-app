@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Book</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        @include('books.form')

        <button type="submit" class="btn btn-primary mt-3">Add Book</button>
    </form>
</div>
@endsection
