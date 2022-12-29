<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="{{asset('favicon.ico')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<title>
		@if 	($lang == 'en') {{$event->getTitle("eng")}}
		@elseif ($lang == 'ru') {{$event->getTitle("ru")}}
		@elseif ($lang == 'ky') {{$event->getTitle("kg")}}
		@else 					{{$event->getTitle("ru")}}
		@endif
	</title>
</head>

<body>
	<div class="container py-3">
		<div class="alert alert-success" role="alert">
			<h4 class="alert-heading text-center">
				@if 	($lang == 'en') Thank you for answer!
				@elseif ($lang == 'ru') Спасибо за ответ!
				@elseif ($lang == 'ky') Жооп бергениз үчүн рахмат!
				@else 					Спасибо за ответ!
				@endif
			</h4>

			<hr>

			@if ($lang == 'en')
				@if 	($answer == 'accept') {!!$event->getAcceptAnswer('eng')!!}
				@elseif ($answer == 'reject') {!!$event->getRejectAnswer('eng')!!}
				@endif
			
			@elseif ($lang == 'ru')
				@if 	($answer == 'accept') {!!$event->getAcceptAnswer('ru')!!} 
				@elseif ($answer == 'reject') {!!$event->getRejectAnswer('ru')!!} 
				@endif

			@elseif ($lang == 'ky')
				@if 	($answer == 'accept') {!!$event->getAcceptAnswer('kg')!!} 
				@elseif ($answer == 'reject') {!!$event->getRejectAnswer('kg')!!} 
				@endif
			@endif
		</div>
	</div>
</body>

</html>