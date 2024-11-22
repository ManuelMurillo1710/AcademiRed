@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Author: {{ $book->author }}</p>
    <p>Year: {{ $book->year }}</p>
    <p>Description: {{ $book->description }}</p>
    <a href="{{ route('books.index') }}">Back to list</a>
@endsection
