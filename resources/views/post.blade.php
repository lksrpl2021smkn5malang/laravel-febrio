@extends('layouts.main')

@section('container')
    <h2>{{ $p->title }}</h2>
    <p>By <a href="#" class="text-decoration-none">{{ $p->user->name }}</a> in  <a href="/categories/{{ $p->category->slug }}" class="text-decoration-none">{{ $p->category->name }}</a></p>
    {!! $p->body !!}

    <a href="/posts" class="d-block mt-3">Back to the Blog</a>
@endsection