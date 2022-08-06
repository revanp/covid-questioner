<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Covid Questioner</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/covid.css') }}">
 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
</head>
<body>
	<div class="ugf-covid covid-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
            		<div class="covid-wrap">
              			<h2>Covid-19 risk test</h2>

              			<form action="{{ url('/') }}" method="post" id="form">
              				@csrf 

              				<div class="covid-test-wrap test-step asign-info active">
              					<div class="test-progress">
			                    	<img src="{{ asset('assets/images/covid/result.png') }}" class="img-fluid" alt="">
			                  	</div>

			                  	<h3 style="color: black">Selamat datang</h3>
			                  	<p>Silahkan isi form dibawah ini untuk mengikuti sesi pertanyaan</p>

			                  	<div class="step-block">
			                  		<div class="row">
			                      		<div class="col-sm-12">
			                        		<div class="form-group">
			                          			<input type="text" class="form-control" placeholder="Nama" name="name">
			                        		</div>
			                      		</div>
			                      		<div class="col-sm-12">
			                        		<div class="form-group">
			                        			<select name="gender" class="form-control">
			                        				<option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
			                        				<option value="M">Laki-laki</option>
			                        				<option value="F">Perempuan</option>
			                        			</select>
			                        		</div>
			                      		</div>
			                      		<div class="col-sm-12">
			                        		<div class="form-group">
			                          			<input type="text" class="form-control date-picker" placeholder="Tanggal Lahir" name="date_of_birth" readonly>
			                        		</div>
			                      		</div>
			                      		<div class="col-sm-12">
			                        		<div class="form-group">
			                          			<input type="email" class="form-control" placeholder="Email" name="email">
			                        		</div>
			                      		</div>
			                      		<div class="col-sm-12">
			                        		<div class="form-group">
			                          			<input type="text" class="form-control" placeholder="No. Telp" name="phone_number">
			                        		</div>
			                      		</div>
			                      		<div class="col-sm-12">
			                        		<div class="form-group">
			                          			<input type="text" class="form-control" placeholder="Alamat" name="address">
			                        		</div>
			                      		</div>
			                      	</div>

			                  		<a href="#" class="button-first">Next</a>
			                  	</div>
              				</div>
              				@foreach($questions as $key => $question)
	              				<div class="covid-test-wrap test-step">
	                  				<div class="test-progress">
	                  					<a href="#" class="prev-btn"><img src="{{ asset('assets/images/arrow-left-grey.png') }}" alt="">Previous</a>

	                    				<div class="test-progress-step">
	                      					<span class="step-number">{{ $key + 1 }}/{{ count($questions) }}</span>

	                      					<svg>
	                        					<circle cx="30" cy="30" r="28" stroke-width="4" fill="none" role="slider" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50"></circle>
	                      					</svg>
	                    				</div>
	                  				</div>

	                  				<input type="hidden" name="participant_answers[{{ $key }}][question_id]" value="{{ $question->id }}">
	                  				<h3>{{ $question->question }}</h3>

                  					<div class="step-block">
                  						@foreach($answers[$key] as $keyAnswer => $answer)
                  							<div class="form-group">
	              								<input type="radio" name="participant_answers[{{ $key }}][answer_id]" class="form-control required" value="{{ $answer->id }}/{{ $answer->code }}" id="answer{{ $answer->id }}" required>
	              								<label for="answer{{ $answer->id }}">{{ $answer->answer }}</label>
	            							</div>
                  						@endforeach

                  						@if($key + 1 == count($questions))
                  							<button class="button-submit" type="button">Submit</button>
                  						@else
                  							<a href="#" class="button">Next</a>
                  						@endif
          							</div>
	                  			</div>
              				@endforeach
              			</form>
              		</div>
              	</div>
			</div>	
		</div>
	</div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>