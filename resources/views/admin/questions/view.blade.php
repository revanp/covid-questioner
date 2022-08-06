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
			<div class="col-lg-6 grid-margin stretch-card"> 
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 grid-margin">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<h5>{{ $subtitle }}</h5>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="table-responsive pt-3">
									<table class="table table-bordered table-striped">
										<tr>
											<th width="20%">Question :</th>
											<td>{{ $data->question }}</td>
										</tr>
										<tr>
											<th width="20%">Sequential :</th>
											<td>{{ $data->seq }}</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 grid-margin stretch-card"> 
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 grid-margin">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<h5>View Answer Question</h5>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="table-responsive pt-3">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th width="5%">No.</th>
												<th>Answer</th>
											</tr>
										</thead>
										<tbody>
											@foreach($answerData as $key => $val)
												<tr>
													<td>{{ $key + 1 }}</td>
													<td>{{ $val->answer }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
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
		
	});
</script>
@endsection