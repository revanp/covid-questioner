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
              			<h2>Covid-19 risk test {{ Session::get('status') }}</h2>

              			<div class="covid-test-wrap test-step test-report active">
                            @if(Session::get('status') == 'X1')
                                <div class="test-progress">
                                    <img src="{{ asset('assets/images/covid/result.png') }}" class="img-fluid" alt="">
                                </div>

                                <h3>Terima kasih atas partisipasi anda, <b>Anda ter-identifikasi Positif Covid-19</b></h3>
                                <p>Tidak perlu khawatir, tim telemedical kami akan segera menghubungi anda dan memberikan panduan yang tepat.</p>
                            @elseif(Session::get('status') == 'X2')
                                <div class="test-progress">
                                    <img src="{{ asset('assets/images/big-green-check.png') }}" class="img-fluid" alt="">
                                </div>

                                <h3>Terima kasih atas partisipasi anda, <b>Anda ter-identifikasi Cenderung Negatif Covid-19</b></h3>
                                <p>Tidak perlu khawatir, selalu jaga kesehatan, kebersihan, dan selalu patuhi protokol kesehatan.</p>
                            @else
                                <div class="test-progress">
                                    <img src="{{ asset('assets/images/covid/result.png') }}" class="img-fluid" alt="">
                                </div>

                                <h3>Terima kasih atas partisipasi anda, <b>Anda ter-identifikasi Positif Covid-19 Tanpa Gejala</b></h3>
                                <p>Tidak perlu khawatir, tim telemedical kami akan segera menghubungi anda dan memberikan panduan yang tepat.</p>
                            @endif

	                  		<h4>Stay Home <span class="line">&#73;</span> Stay Safe</h4>
	                  		<h4>#dirumahaja</h4>
	                  		
	                  		<a href="{{ url('/') }}" class="button-reload">Kembali ke halaman awal</a>
	                	</div>
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