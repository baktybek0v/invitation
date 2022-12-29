<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Приглашение</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<style>
		body {
			background: rgb(219, 231, 241);
			padding: 30px;
			font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
			font-family: Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-weight: 600;
		}
		.wave {
			--c:red;   
			--t:5px;   
			--h:50px;  
			--w:120px; 
			--p:13px; 
			
			background:
				radial-gradient(farthest-side at 50% calc(100% + var(--p)), #0000 47%, var(--c) 50% calc(50% + var(--t)),transparent calc(52% + var(--t))),
				radial-gradient(farthest-side at 50% calc(0%   - var(--p)), #0000 47%, var(--c) 50% calc(50% + var(--t)),transparent calc(52% + var(--t)));
				
			background-size: var(--w) var(--h);
			background-position: calc(var(--w)/2) calc(var(--h)/2),0px calc(var(--h)/2);
			
			display:block;
			width:100%;
			min-height: 100px;
			height:auto;
			padding: 30px;
		}

		.blue {color: rgb(57, 147, 172); }
		.blue-middle{color: rgb(23, 68, 105)}																													
		.blue-dark {color: rgb(0, 18, 67); }

		.norm-size {font-size: 14px;}
		.small-size {font-size: 12px;}
		.tiny-size {font-size: 10px;}
	</style>

</head>

<body>

	<div class="container">
		@foreach ($invitee->getAllLang() as $lang)
			<div class="offset-2 col-8 bg-white p-0 mb-5" style="overflow: hidden">
				<div class="wave" style="--w:50px ;--h:8px;--p:2px;  --t:2px;--c:rgba(215, 215, 219, .15)">
					<header class="d-flex justify-content-between mb-3">	
						@if 	($lang == 'eng') <img src="{{asset('img/template/30_en.png')}}" alt="" height="70">
						@elseif ($lang == "ru")  <img src="{{asset('img/template/30_ru.png')}}" alt="" height="70">
						@elseif ($lang == "kg")  <img src="{{asset('img/template/30_ky.png')}}" alt="" height="70">
						@endif
						<img style="margin-top: -20px" src="{{asset('img/undp-logo.png')}}" alt="" height="120">
					</header>
					<main class="mb-5">
						<p class="text-center">
							<img src="{{asset('img/template/up.png')}}" alt="" height="20">
						</p>

						<p class="text-center blue font-italic">
							{{$invitee->getTitle($lang)}} {{$invitee->getFullName($lang)}}, <br>
							Постоянный Представитель ПРООН в Кыргызской Республике<br>
							г-жа Луиз Чемберлен<br>
							имеет честь пригласить Вас<br>
							на торжественное мероприятие по случаю<br>
							празднования 30-летнего юбилея сотрудничества<br>
							в области развития в Кыргызской Республике,
							во вторник 22 ноября 2022 года, с 18:00 до 20:30,<br>
							в здании Кыргызского Театра Оперы и Балета по адресу ул. Абдрахманова 16<br>
						</p>

						<p class="text-center">	
							<img src="{{asset('img/template/down.png')}}" alt="" height="20">
						</p>
					</main>
					<footer class="d-flex justify-content-between align-items-end">
						<div class="d-flex flex-column align-items-center">
							@if 	($lang == 'eng') 
								<img src="{{asset('img/template/qr_en.png')}}" alt="" height="60">
								<p class="blue-dark mt-1 small-size font-weight-bold">Scan to RSVP online</p>
							@elseif ($lang == "ru") 
								<img src="{{asset('img/template/qr_ru.png')}}" alt="" height="70">
								<p class="blue-dark mt-1 small-size font-weight-bold">Просьба подтвердить<br>Ваше участие по ссылке:</p>
							@elseif ($lang == "kg")  
								<img src="{{asset('img/template/qr_ky.png')}}" alt="" height="60">
								<p class="blue-dark mt-1 small-size font-weight-bold">Катышуунузду ырастоо <br>бул шилтеме аркылуу</p>
							@endif
						</div>
						<div style="margin-left: -30px" class="font-italic"">
							@if ($lang == 'eng')
								<p class="small-size blue text-center">Event languages: <br>
									<span class="font-weight-bold blue-middle">Kyrgyz</span>,
									<span class="font-weight-bold blue-middle">Russian</span>,
									<span class="font-weight-bold blue-middle">English</span>
								</p>

							@elseif ($lang == "ru")  
								<p class="small-size blue text-center">Язык мероприятия: <br>
									<span class="font-weight-bold blue-middle">кыргызский</span>,
									<span class="font-weight-bold blue-middle">русский</span>,
									<span class="font-weight-bold blue-middle">английский</span>
								</p>

							@elseif ($lang == "kg")
								<p class="small-size blue text-center">Иш-чара:
									<span class="font-weight-bold blue-middle">кыргыз</span>,
									<span class="font-weight-bold blue-middle">орус</span> жана
									<span class="font-weight-bold blue-middle">англис</span> <br>
									тилдеринде өтөт
								</p>
							@endif
						</div>
						<div>
							@if 	($lang == 'eng') <p class="blue-dark small-size">Business Attire</p>
							@elseif ($lang == "ru")  <p class="blue-dark small-size">Форма одежды - <br> деловой стиль</p>
							@elseif ($lang == "kg")  <p class="blue-dark small-size">Кийим стили - <br> Ишкердик</p>
							@endif
						</div>
					</footer>
				</div>
			</div>
		@endforeach

		<form class="mb-5" action="{{route('web.invitation', ["event_id" => $event->id, "uniq_code" => $invitee->uniq_code])}}">
			<button class="d-block mx-auto btn btn-primary">
				@if ($invitee->getFirstLang() == 'eng')    Answer the invitation
				@elseif ($invitee->getFirstLang() == 'ru') Ответить на приглашени
				@elseif ($invitee->getFirstLang() == 'kg') Чакырууга жооп берүү
				@endif
			</button>
		</form>
	</div>
</body>
</html>