@extends('layouts.app')

@section('content')
    <h1>Add Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Author:</label>
        <input type="text" name="author" required>
        <label>Year:</label>
        <input type="number" name="year" required>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <button type="submit">Save</button>
    </form>
@endsection
