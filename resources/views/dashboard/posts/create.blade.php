@extends('dashboard.layouts.main')

@section('container')
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create a New Post</h1>
        </div>

		<div class="col-lg-8">	
         	<form action="/dashboard/posts" method="post">
         	  @csrf
			  <div class="row mb-3">
			  	<div class="col">	
				    <label for="title" class="form-label">Title</label>
				    <input type="text" class="form-control" name="title" id="title">
			  	</div>
			  	<div class="col">
			  		<label for="slug" class="form-label">Slug</label>
			    	<input type="text" class="form-control" name="slug" id="slug" disabled readonly>
			  	</div>
			  </div>
			  <div class="mb-3">
			    <label for="category" class="form-label">Category</label>
				<select class="form-select" name="category_id" id="category">
				  @foreach ($categories as $c)
				  	<option value="{{ $c->id }}">{{ $c->name }}</option>
				  @endforeach
				</select>
			  </div>
			  <div class="mb-3">
			    <label for="body" class="form-label">Body</label>
			    <input id="body" type="hidden" name="body">
  				<trix-editor input="body"></trix-editor>
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