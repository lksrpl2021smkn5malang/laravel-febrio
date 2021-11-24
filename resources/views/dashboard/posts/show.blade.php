@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $p->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="/dashboard/posts/{{ $p->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $p->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>

                @if ($p->image)
                <div style="max-height: 400px; overflow: hidden;">
                  <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->category->name }}" class="img-fluid mt-3">
                </div>
                @else
                  <img src="https://source.unsplash.com/1200x400?{{ $p->category->name }}" alt="{{ $p->category->name }}" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    {!! $p->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection