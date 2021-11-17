@extends('layouts.main')

@section('container')
    <h2 class="mb-3 text-center">{{ $title }}</h2>
    <div class="row justify-content-center mb-2">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                  <button class="btn btn-outline-secondary bg-transparent" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p><small class="text-muted">By <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $p)
            <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="position-absolute bg-dark px-2 py-1 bg-opacity-75 rounded"><a href="/posts?category={{ $p->category->slug }}" class="text-white text-decoration-none">{{ $p->category->name }}</a></div>
                  <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="card-img-top" alt="{{ $p->category->name }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ $p->title }}</h5>
                    <p><small class="text-muted">By <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $p->author->name }}</a> {{ $p->created_at->diffForHumans() }}</small></p>
                    <p class="card-text">{{ $p->excerpt }}</p>
                    <a href="/posts/{{ $p->slug }}" class="btn btn-primary">Read more</a>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

@endsection
