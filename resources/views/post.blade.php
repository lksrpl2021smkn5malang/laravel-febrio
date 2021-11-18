@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $p->title }}</h2>
                <p>By <a href="/posts?author={{ $p->author->username }}" class="text-decoration-none">{{ $p->author->name }}</a> in  <a href="/posts?category={{ $p->category->slug }}" class="text-decoration-none">{{ $p->category->name }}</a></p>
                <img src="https://source.unsplash.com/1200x400?{{ $p->category->name }}" alt="{{ $p->category->name }}" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $p->body !!}
                </article>

                <a href="/posts" class="d-block mt-3">Back to the Blog</a>
            </div>
        </div>
    </div>
@endsection