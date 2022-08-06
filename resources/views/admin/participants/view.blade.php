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
											<th width="20%">Nama</th>
											<td>{{ $data->name }}</td>
										</tr>
										<tr>
											<th width="20%">Jenis Kelamin</th>
											<td>{{ $data->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</td>
										</tr>
										<tr>
											<th width="20%">Email</th>
											<td>{{ $data->email }}</td>
										</tr>
										<tr>
											<th width="20%">No. Telp</th>
											<td>{{ $data->phone_number }}</td>
										</tr>
										<tr>
											<th width="20%">Tanggal Lahir</th>
											<td>{{ $data->date_of_birth }}</td>
										</tr>
										<tr>
											<th width="20%">Alamat</th>
											<td>{{ $data->address }}</td>
										</tr>
										<tr>
											<th width="20%">Created At</th>
											<td>{{ $data->created_at }}</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-12 grid-margin stretch-card"> 
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 grid-margin">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<h5>View Participant Answers</h5>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="table-responsive pt-3">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th width="5%">No.</th>
												<th>Pertanyaan</th>
												<th>Jawaban</th>
											</tr>
										</thead>
										<tbody>
											@foreach($answerData as $key => $val)
												<tr>
													<td>{{ $key + 1 }}</td>
													<td>{{ $val->question }}</td>
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