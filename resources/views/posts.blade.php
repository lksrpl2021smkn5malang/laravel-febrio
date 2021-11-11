@extends('layouts.main')

@section('container')
    @foreach ($posts as $p)
    <article class="mb-5 border-bottom pb-3">
        <h2><a href="/posts/{{ $p->slug }}" class="text-decoration-none">{{ $p->title }}</a></h2>
        <p>By <a href="#" class="text-decoration-none">{{ $p->user->name }}</a> in <a href="/categories/{{ $p->category->slug }}">{{ $p->category->name }}</a></p>
        <p>{{ $p->excerpt }}</p>
        <a href="/posts/{{ $p->slug }}" class="text-decoration-none">Read more..</a>
    </article>
    @endforeach
@endsection
