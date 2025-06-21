@extends('layouts.app')

@section('content')
    <h1>Welcome to the Dashboard!</h1>
    <p>You are logged in as {{ Auth::user()->role }}</p>
@endsection
