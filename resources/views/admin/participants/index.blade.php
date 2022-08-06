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
									<div>
										<a href="{{ url('admin/questions/create') }}" class="btn btn-primary btn-icon-text btn-rounded show-modal-add">
											<i class="fas fa-plus"></i> Add Data
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive pt-3">
							<table id="datatable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Email</th>
										<th>Tanggal Lahir</th>
										<th class="text-center" width="20%">Action</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
	$(document).ready(function(){
		var datatable = $('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ url('admin/participants') }}",
				type: "GET"
			},
			columns: [
				{data: 'name', name: 'name'},
				{data: 'gender', name: 'gender'},
				{data: 'email', name: 'email'},
				{data: 'date_of_birth', name: 'date_of_birth'},
				{data: 'action' , name: 'action', 'class': 'text-center'},
			]
		});
	});
</script>
@endsection