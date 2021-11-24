@extends('layouts.main')

@section('container')
	<div class="row justify-content-center">
		<div class="col-md-4">
			<!-- Flashdatas -->
			@if(session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  {{ session('success') }}
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			@if(session()->has('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  {{ session('error') }}
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			
			<main class="form-signin my-5">
			  <h1 class="h3 mb-3 fw-normal text-center">Log In to Feb's Blog</h1>
			  <form action="/login" method="post">
			  	@csrf
			    <div class="form-floating">
			      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
			      <label for="email">Email address</label>
			      @error('email')
					<div class="invalid-feedback">
						{{ $message }}
      				</div>
			      @enderror
			    </div>
			    <div class="form-floating">
			      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
			      <label for="password">Password</label>
			    </div>
			    <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
			  </form>
			  <small class="d-block text-center mt-3">Don't have an account? <a href="/register">Register here</a></small>
			</main>
		</div>	
	</div>
@endsection