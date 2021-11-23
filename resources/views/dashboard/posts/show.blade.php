@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $p->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <a href="" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</a>
                <img src="https://source.unsplash.com/1200x400?{{ $p->category->name }}" alt="{{ $p->category->name }}" class="img-fluid mt-3">

                <article class="my-3 fs-5">
                    {!! $p->body !!}
                </article>

                <a href="/posts" class="d-block mt-3">Back to the Blog</a>
            </div>
        </div>
    </div>
@endsection