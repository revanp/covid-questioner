@extends('layouts.app-admin')

@section('title', 'Admin Login')

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="#"><b>Covid </b>Questioner</a>
	</div>

	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in</p>

			@if($errors->any())
			<div class="alert alert-danger">
				<div>{{ $errors->first() }}</div>
			</div>
			@endif

			<form method="post" action="{{ route('login') }}" class="pt-3">
				{{ csrf_field() }}

				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Username" id="username" name="username" required autofocus>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="remember" name="remember">
							<label for="remember">
								Remember Me
							</label>
						</div>
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection