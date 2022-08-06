$(document).ready(function() {
	'use strict';

	$('.test-step .button-first').on('click', function(e) {
		e.preventDefault();

		var name = $(this).parents('.step-block').find('input[name="name"]').val();
		var gender = $(this).parents('.step-block').find('select[name="gender"]').val();
		var date_of_birth = $(this).parents('.step-block').find('input[name="date_of_birth"]').val();
		var email = $(this).parents('.step-block').find('input[name="email"]').val();
		var phone_number = $(this).parents('.step-block').find('input[name="phone_number"]').val();

		if(name == '' || gender == null || date_of_birth == '' || email == '' || phone_number == ''){
			Swal.fire({
				title: 'Error!',
				text: 'Lengkapi identitas anda!',
				icon: 'error',
				confirmButtonText: 'Ok'
			})

			return;
		}	
		
		$(this).parents('.test-step').next().addClass('active');
		$(this).parents('.test-step').removeClass('active');
	})

	$('.test-step .button').on('click', function(e) {
		e.preventDefault();

		var validation = $(this).parents('.step-block').children('.form-group').children('.required:checked').length;

		if(validation < 1){
			Swal.fire({
				title: 'Error!',
				text: 'Lengkapi jawaban anda!',
				icon: 'error',
				confirmButtonText: 'Ok'
			})

			return;
		}	
		
		$(this).parents('.test-step').next().addClass('active');
		$(this).parents('.test-step').removeClass('active');
	})

	$('.test-step .button-submit').on('click', function(e) {
		e.preventDefault();

		var validation = $(this).parents('.step-block').children('.form-group').children('.required:checked').length;

		if(validation < 1){
			Swal.fire({
				title: 'Error!',
				text: 'Lengkapi jawaban anda!',
				icon: 'error',
				confirmButtonText: 'Ok'
			})

			return;
		}	
		
		var form = $('#form').submit();
	})

	$('.test-step .prev-btn').on('click', function(e) {
		e.preventDefault();
		$(this).parents('.test-step').prev().addClass('active');
		$(this).parents('.test-step').removeClass('active');
	})

	$('.date-picker').datepicker({
		format: "yyyy-mm-dd"
	});
})