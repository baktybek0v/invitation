<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="">
        <meta charset="utf-8" />
        <title>
			@yield('title', 'UNDP')
		</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
		<link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/bash.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/froala.css')}}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" />
		@yield('styles')
		@if (request()->is(app()->getLocale().'/activity*'))
			<script type="text/javascript" src="{{ config('LaravelLogger.JQueryCDN') }}"></script>
			<script type="text/javascript" src="{{ config('LaravelLogger.bootstrapJsCDN') }}"></script>
			<script type="text/javascript" src="{{ config('LaravelLogger.popperJsCDN') }}"></script>
		@endif
    </head>

	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">

		@include('bash.layouts.partials._header-mobile')
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					@include('bash.layouts.partials._header')
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('subheader')
						<div class="d-flex flex-column-fluid">
							<div class="container-fluid">
								<div class="d-lg-flex flex-row-fluid">
									<div class="content-wrapper flex-row-fluid">
										@yield('content')
									</div>
								</div>
							</div>
						</div>
					</div>
					@include('bash.layouts.partials._footer')
				</div>
			</div>
		</div>

		@include('bash.layouts.partials._extras.scrolltop')

		<script>
			var HOST_URL;
			var KTAppSettings;
		</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>

		<script src="{{ asset('assets/js/pages/widgets.js')}}"></script>
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('js/vendor/froala_editor.pkgd.min.js')}}" type="text/javascript"></script>
		<script src="{{ asset('js/vendor/ru.min.js')}}"></script>

		<script>
			moment.locale('ru');
			$(function() {
				$('.desc').froalaEditor({
					language: 'ru',
					height: 160,
					toolbarSticky: false,
					placeholderText: '',
					toolbarButtons: [],
					quickInsertButtons: [],
					charCounterMax: 500,
				})

				$('.froala').froalaEditor({
					language: 'ru',
					height: 550,
					toolbarSticky: false,
					placeholderText: '??????????',
					imageUploadParam: 'file',
					imageUploadURL: "{{ asset('froala/upload_image.php') }}",
					imageManagerLoadURL: "",
					fileUpload: true,
					fileUploadURL: "{{ asset('froala/upload_file.php') }}",
					fileUploadMethod: "POST",
					fileUploadParam: 'file1',
					fileMaxSize: 20 * 1024 * 1024,
					fileAllowedTypes: ["*"]
				})
			});

			$(document).on('click', '.btn-to-alert', function (e) {

				var button = $(this);

				id = $(this).attr('data-id');
				e.preventDefault();

				swal.fire({
					title: "???? ???????????????",
					text: "?????? ???????????????? ?????????????? ????????????????????!",
					type: "warning",
					showCancelButton: !0,
					confirmButtonText: "????, ??????????????!",
					cancelButtonText: "????????????????!",
					customClass: {
						confirmButton: "m-0 btn btn-danger mr-2",
						cancelButton: "m-0 btn btn-secondary",

					}
				}).then(function(e) {
					console.log(button.attr('href'));
					if (e.value) {
						$.post({
							type: 'DELETE',
							url: button.attr('href'),
							data: {
								id: id,
								_token: '{{csrf_token()}}'
							}
						}).done(function (data) {
							if(data == 'Success'){
								$('.table').DataTable().ajax.reload();
								// document.location.reload(true);
								toastr.success("???????????? ?????????????? ??????????????", "??????????");
							}else if(data == 'reload'){
								// document.location.reload(true);
								location.reload();
							}
						});
					}
				})
			});

			let arrows;
			if (KTUtil.isRTL()) {
				arrows = {
					leftArrow: '<i class="la la-angle-right"></i>',
					rightArrow: '<i class="la la-angle-left"></i>'
				}
			} else {
				arrows = {
					leftArrow: '<i class="la la-angle-left"></i>',
					rightArrow: '<i class="la la-angle-right"></i>'
				}
			};
		</script>
		@if (request()->is(app()->getLocale().'/activity*'))
			<script>
				$(function() {
					$(".clickable-row").click(function() {
						window.location = $(this).data("href");
					});
				});
				$(document).on('mouseenter', "div.activity-table table > tbody > tr > td ", function () {
					var $this = $(this);
					if (this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
						$this.attr('title', $this.text());
					}
				});
				$(function() {
					$('[data-toggle="tooltip"]').tooltip();
				});
			</script>

			<script type="text/javascript" src="{{config('LaravelLogger.loggerDatatablesJScdn')}}"></script>
			<script type="text/javascript" src="{{config('LaravelLogger.loggerDatatablesJSVendorCdn')}}"></script>
			<script type="text/javascript">
				$(function() {
					$('.data-table').dataTable({
						"order": [[0]],
						"pageLength": 100,
						"lengthMenu": [
							[10, 25, 50, 100, 500, 1000, -1],
							[10, 25, 50, 100, 500, 1000, "All"]
						],
						"paging": true,
						"lengthChange": true,
						"searching": true,
						"ordering": true,
						"info": true,
						"autoWidth": true,
						"dom": 'T<"clear">lfrtip',
						"sPaginationType": "full_numbers",
						'aoColumnDefs': [{
							'bSortable': false,
							'searchable': false,
							'aTargets': ['no-search'],
							'bTargets': ['no-sort']
						}]
					});
				});
			</script>
		@endif
		@yield('scripts')

	</body>
</html>
