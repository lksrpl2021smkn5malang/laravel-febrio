@extends('dashboard.layouts.main')

@section('container')
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Post</h1>
        </div>

		<div class="col-lg-8">	
         	<form action="/dashboard/posts/{{ $p->slug }}" method="post" class="mb-5">
         	  @method('put')
         	  @csrf
			  <div class="row mb-3">
			  	<div class="col">	
				    <label for="title" class="form-label">Title</label>
				    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $p->title) }}" required autofocus>
				    @error('title')
						<div class="invalid-feedback">
							{{ $message }}
      					</div>
			      	@enderror
			  	</div>
			  	<div class="col">
			  		<label for="slug" class="form-label">Slug</label>
			    	<input type="text" class="form-control" name="slug" id="slug" value="{{ $p->slug }}" readonly>
			  	</div>
			  </div>
			  <div class="mb-3">
			    <label for="category" class="form-label">Category</label>
				<select class="form-select" name="category_id" id="category">
				  @foreach ($categories as $c)
				  	@if(old('category_id', $p->category_id) == $c->id)
				  	  <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
				  	@else
				  	  <option value="{{ $c->id }}">{{ $c->name }}</option>
				  	@endif
				  @endforeach
				</select>
			  </div>
			  <div class="mb-3">
			    <label for="body" class="form-label">Body</label>
			    <input id="body" type="hidden" name="body" value="{{ old('body', $p->body) }}">
  				<trix-editor input="body"></trix-editor>
  				@error('body')
  					<p class="text-danger">{{ $message }}</p>
  				@enderror
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

		<script>
			const title = document.querySelector('#title');
			const slug = document.querySelector('#slug');

			title.addEventListener('change', function() {
				fetch('/dashboard/posts/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
			});

			document.addEventListener('trix-file-accept', function(e) {
				e.preventDefault();
			})
		</script>
@endsection