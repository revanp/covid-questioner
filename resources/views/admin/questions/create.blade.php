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
					<form action="{{ url('admin/questions/create') }}" method="post">
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
				                    	<label>Question</label>
				                    	<input type="text" name="question" class="form-control" placeholder="Enter question" required>
				                  	</div>
				                  	<div class="form-group">
				                    	<label>Sequential</label>
				                    	<input type="number" name="seq" class="form-control" placeholder="Enter sequential" required>
				                  	</div>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="col-md-12 grid-margin">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<h5>{{ $title }} Answers</h5>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row answer-class">
										<div class="col-md-12">
											<div class="row">
												<div class="form-group col-md-7">
													<label>Answer</label>
													<input type="text" name="answer[]" class="form-control" placeholder="Enter answer" required>
												</div>
												<div class="form-group col-md-4">
													<label>Code</label>
													<input type="text" name="code[]" class="form-control" placeholder="Enter code" required>
												</div>
												<div class="form-group col-md-1 mt-4">
													<button class="btn btn-danger col-md-12 btn-delete-answer"><strong>X</strong></button>
												</div>
											</div>
										</div>
					                </div>
					                <button class="btn btn-primary btn-add-answer col-md-12">Add Answer</button>
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

@section('script')
<script>
	$('.btn-add-answer').click(function(e){
		e.preventDefault();

		var html = '<div class="col-md-12">';
				html += '<div class="row">';
					html += '<div class="form-group col-md-7">';
						html += '<label>Answer</label>';
						html += '<input type="text" name="answer[]" class="form-control" placeholder="Enter answer" required>';
					html += '</div>';
					html += '<div class="form-group col-md-4">';
						html += '<label>Code</label>';
						html += '<input type="text" name="code[]" class="form-control" placeholder="Enter code" required>';
					html += '</div>';
					html += '<div class="form-group col-md-1 mt-4">';
						html += '<button class="btn btn-danger col-md-12 btn-delete-answer"><strong>X</strong></button>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

		$('.answer-class').append(html);

		$('.btn-delete-answer').click(function(e){
			e.preventDefault();

			$(this).parent().parent().parent().html('');
		})
	})

	$('.btn-delete-answer').click(function(e){
		e.preventDefault();

		$(this).parent().parent().parent().html('');
	})
</script>
@endsection