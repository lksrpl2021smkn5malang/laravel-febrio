@extends('layouts.main')

@section('container')
    <h2>{{ $p->title }}</h2>
    <p><strong>Category:</strong> <a href="/categories/{{ $p->category->slug }}">{{ $p->category->name }}</a></p>
    {!! $p->body !!}

    <a href="/posts">Back to the Blog</a>
@endsection