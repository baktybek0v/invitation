<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{asset('favicon.ico')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<style>

		html, body {
			width: 100%;
			height: 100%;
			overflow: hidden;
		}

		body{
			font-family: sans-serif;
			margin: 0;
			font-size: .9rem;
			font-weight: 400;
			line-height: 1.6;
			color: #212529;
			text-align: left;
			background-color: #f5f8fa;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.my-form
		{
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.my-form .row
		{
			margin-left: 0;
			margin-right: 0;
		}

		.login-form
		{
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.login-form .row
		{
			margin-left: 0;
			margin-right: 0;
		}
	</style>

	<title>
		@if 	($lang == 'en') {{$event->getTitle("eng")}}
		@elseif ($lang == 'ru') {{$event->getTitle("ru")}}
		@elseif ($lang == 'ky') {{$event->getTitle("kg")}}
		@else 					{{$event->getTitle("ru")}}
		@endif
	</title>
</head>

<body>
  
	<!-- Modal -->
	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">
						@if 	($lang == 'en') Confirmation
						@elseif ($lang == 'ru') Потверждение
						@elseif ($lang == 'ky') Тастыктоо
						@else 					Потверждение
						@endif
					</h5>
					{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> --}}
				</div>
				<div class="modal-body">
					@if 	($lang == 'en') Do you accept the invitation?
					@elseif ($lang == 'ru') Принимаете ли вы приглашение?
					@elseif ($lang == 'ky') Чакырууну кабыл аласызбы?
					@else 					Принимаете ли вы приглашение?
					@endif
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger px-3"
						href="{{route('web.invitation_specific_qr.answer', ['answer' => 'reject', 'lang' => $lang])}}">
						@if 	($lang == 'en') No
						@elseif ($lang == 'ru') Нет
						@elseif ($lang == 'ky') Жок
						@else 					Нет
						@endif
					</a>
					<button onclick="$('#section-form').show();"  type="button" class="btn btn-success px-3" data-dismiss="modal">
						@if 	($lang == 'en') Yes
						@elseif ($lang == 'ru') Да
						@elseif ($lang == 'ky') Ооба
						@else 					Да
						@endif
					</button>
				</div>
			</div>
		</div>
	</div>


    <div class="form w-100" id="section-form" style="display: none">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<div class="card">
						<div class="card-header">
							@if 	($lang == 'en') Registration for event
							@elseif ($lang == 'ru') Регистрация на мероприятие
							@elseif ($lang == 'ky') Иш-чарага катталуу
							@else 					Регистрация на мероприятие
							@endif
						</div>
						<div class="card-body">
							<form name="my-form" onsubmit="return validform()" action="{{route('web.invitation_specific_qr.answer', ['answer' => "accept", 'lang' => $lang])}}" method="POST">
								@csrf
								<div class="form-group row">
									<label for="full_name" class="col-md-4 col-form-label text-md-right">
										@if 	($lang == 'en') Full name
										@elseif ($lang == 'ru') ФИО
										@elseif ($lang == 'ky') Аты-жөнү
										@else 					ФИО
										@endif
										<span class="text-danger">*</span></label>
									<div class="col-md-6">
										<input type="text" id="full_name" class="form-control" name="full_name">
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">Email <span class="text-danger">*</span></label>
									<div class="col-md-6">
										<input type="email" id="email" class="form-control" name="email">
									</div>
								</div>

								<div class="form-group row">
									<label for="organization" class="col-md-4 col-form-label text-md-right">
										@if 	($lang == 'en') Organization
										@elseif ($lang == 'ru') Организация
										@elseif ($lang == 'ky') Мекеме
										@else 					Организация
										@endif
									</label>
									<div class="col-md-6">
										<input type="text" id="organization" class="form-control" name="username">
									</div>
								</div>

								<div class="form-group row">
									<label for="position" class="col-md-4 col-form-label text-md-right">
										@if 	($lang == 'en') Position
										@elseif ($lang == 'ru') Позиция
										@elseif ($lang == 'ky') Кызмат орду
										@else 					Позиция
										@endif
									</label>
									<div class="col-md-6">
										<input type="text" id="position" class="form-control">
									</div>
								</div>

								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										@if 	($lang == 'en') Send
										@elseif ($lang == 'ru') Отправить
										@elseif ($lang == 'ky') Жөнөтүү
										@else 					Отправить
										@endif
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </main>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script>
		function validform() {
			var a = document.forms["my-form"]["full_name"].value;
			var b = document.forms["my-form"]["email"].value;

			if (a==null || a=="" || a.length < 3)
			{
				alert("Пожалуйста введите свое полное имя");
				return false;
			}else if (b==null || b=="" || b.length < 5)
			{
				alert("Пожалуйста, введите свой адрес электронной почты");
				return false;
			}
		}
		
		$(document).ready(function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#confirmModal').modal({backdrop: 'static', keyboard: false})  
		});

	</script>
</body>

</html>
