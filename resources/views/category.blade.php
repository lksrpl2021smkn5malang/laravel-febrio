@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Posts Category : {{ $category }}</h1>

    @foreach ($posts as $p)
    <article class="mb-4">
        <h2><a href="/posts/{{ $p->slug }}">{{ $p->title }}</a></h2>
        <p>{{ $p->excerpt }}</p>
    </article>
    @endforeach
@endsection
