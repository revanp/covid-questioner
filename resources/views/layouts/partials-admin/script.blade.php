	<script src="{{ asset('assets-admin/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<script src="{{ asset('assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/chart.js/Chart.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/sparklines/sparkline.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/bootstrap-clockpicker/dist/bootstrap-clockpicker.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<script src="{{ asset('assets-admin/dist/js/adminlte.js') }}"></script>

	<script src="{{ asset('assets-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

	<script src="{{ asset('assets-admin/plugins/jquery-form/jquery.form.js') }}"></script>
	<script src="{{ asset('assets-admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

	<script type="text/javascript">
		var formatCurrency = function(num) {
	        var str = num.toString(),
	            parts = false,
	            output = [],
	            i = 1,
	            formatted = null;
	        if (str.indexOf(".") > 0) {
	            parts = str.split(".");
	            str = parts[0];
	        }
	        str = str.split("").reverse();
	        for (var j = 0, len = str.length; j < len; j++) {
	            if (str[j] != ",") {
	                output.push(str[j]);
	                if (i % 3 == 0 && j < (len - 1)) {
	                    output.push(",");
	                }
	                i++;
	            }
	        }
	        formatted = output.reverse().join("");
	        return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
	    };
	    
		$('form').on("keyup keypress", function(e) {
			var code = e.keyCode || e.which; 
			if (code  == 13) {               
				e.preventDefault();
				return false;
			}
		});

		$('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });

        $('.clockpicker').clockpicker({
            placement: 'top',
            align: 'left',
            autoclose: true,
        });

		$("body").on("click", ".btn-delete-on-table", function(e) {
			e.preventDefault();
			var a = $(this).attr("href");
			var judul = ($(this).data('judul') == undefined ? 'Apakah Anda Yakin?' : $(this).data('judul'));
			var textmsg = ($(this).data('textmsg') == undefined ? 'Data ini akan terhapus secara permanen, pastikan anda yakin untuk menghapus data ini?' : $(this).data('textmsg'));
			var textok = ($(this).data('textok') == undefined ? 'Ok' : $(this).data('textok'));
			var textno = ($(this).data('textno') == undefined ? 'Batal' : $(this).data('textno'));

			swal.fire({
				title: judul,
				text: textmsg,
				icon: "warning",
				showCancelButton: !0,
				confirmButtonText: textok,
				cancelButtonText: textno
			}).then(e => {
				e.value ? $.ajax({
					url: a,
					type: "get",
					dataType: "json",
					beforeSend: function() {
						swal.fire({
							icon : 'info',
							title: 'Harap menunggu',
							text: 'Sedang melakukan penghapusan data.',
							showCancelButton: false,
							showConfirmButton: false,
							allowOutsideClick : false,
							allowEscapeKey : false,
							allowEnterKey : false
						})
					},
					success: function(e) {
						swal.fire({
							icon : e.level,
							title: e.message,
							text: e.text
						})

						if(e.level == 'success'){
							location.reload();
						}
					},
					error: function() {
						swal("Ooopp!!!", "Failed to deleted record, please try again", "error")
					}
				}) : e.dismiss
			})
		})
	</script>

	@yield('script')