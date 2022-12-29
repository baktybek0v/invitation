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
		@if 	 (app()->getLocale() == 'en') {{$event->getTitle("eng")}}
		@elseif  (app()->getLocale() == 'ru') {{$event->getTitle("ru")}}
		@elseif  (app()->getLocale() == 'ky') {{$event->getTitle("kg")}}
		@endif
	</title>
</head>

<body>
	<div class="container py-3">
		<div class="alert alert-success" role="alert">
			<h4 class="alert-heading text-center">
				{{$trans['thanks'] ?? " Спасибо за ответ!"}}
			</h4>

			<hr>

			@if (app()->getLocale() == 'en')
				@if 	($answer == 'accept') {!!$event->getAcceptAnswer('eng')!!}
				@elseif ($answer == 'reject') {!!$event->getRejectAnswer('eng')!!}
				@endif
			
			@elseif (app()->getLocale() == 'ru')
				@if 	($answer == 'accept') {!!$event->getAcceptAnswer('ru')!!} 
				@elseif ($answer == 'reject') {!!$event->getRejectAnswer('ru')!!} 
				@endif

			@elseif (app()->getLocale() == 'ky')
				@if 	($answer == 'accept') {!!$event->getAcceptAnswer('kg')!!} 
				@elseif ($answer == 'reject') {!!$event->getRejectAnswer('kg')!!} 
				@endif
			@endif
		</div>
	</div>
</body>

</html>