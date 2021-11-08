@extends('layouts.main')

@section('container')
    @foreach ($posts as $p)
    <article class="mb-4">
        <h2><a href="/posts/{{ $p->slug }}">{{ $p->title }}</a></h2>
        <p>{{ $p->excerpt }}</p>
    </article>
    @endforeach
@endsection
