@extends('layouts.app-admin')
@section('title', $title)

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3 class="m-0 text-dark">{{ $title }}</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">{{ $title }}</li>
					<li class="breadcrumb-item active">{{ $subtitle }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card"> 
				<div class="card">
					<form action="{{ url('admin/users/create') }}" method="post">
						<div class="card-body">
							@if(Session::has('message'))
								<div class="alert {{ Session::get('alert-class') }} alert-dismissible">
				                  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                  	<h5><i class="icon fas fa-info"></i> {{ Session::get('message') }}</h5>
				                </div>
							@endif
							
							<div class="row">
								<div class="col-md-12 grid-margin">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5>{{ $subtitle }}</h5>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									@csrf
									
									<div class="form-group">
				                    	<label>Name</label>
				                    	<input type="text" name="name" class="form-control" placeholder="Enter name" required>
				                  	</div>
				                  	<div class="form-group">
				                    	<label>Username</label>
				                    	<input type="text" name="username" class="form-control" placeholder="Enter username" required>
				                  	</div>
				                  	<div class="form-group">
				                    	<label>Password</label>
				                    	<input type="password" name="password" class="form-control" placeholder="Enter password" required>
				                  	</div>
									<div class="form-group">
				                    	<label>Email address</label>
				                    	<input type="email" name="email" class="form-control" placeholder="Enter email" required>
				                  	</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection