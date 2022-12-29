<!DOCTYPE html>
<html>

<head>
	<title></title>

	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700);

		body {
			background-color: #78909c;
			font-family: 'Roboto';
		}

		.overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.50);
		}

		.center {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
		}

		.conf-modal {
			width: 290px;
			max-width: 80%;
			height: 300px;
			background-color: #fafafa;
			border-radius: 3px;
			box-shadow: 0 12px 36px 16px rgba(0, 0, 0, 0.24);
		}

		.conf-modal h1 {
			font-size: 24px;
			font-weight: 500;
			line-height: 10px;
			display: inline-block;
		}

		.title-text {
			display: inline-block;
			height: 35px;
			line-height: 52px;
			margin-top: 22px;
		}

		.success h1 {
			color: #292920;
		}
			
		.title-icon {
			width: 27px;
			height: 27px;
			display: inline-block;
			margin-right: 10px;
			margin-left: 30px;
			margin-top: 30px;
			position: absolute;
		}
			
		.conf-modal p {
			color: #737373;
			padding: 15px 30px;
			font-size: 16px;
			line-height: 24px;
		}
		
		.modal-footer {
			background: red;
		}
		
		.modal-footer .conf-but {
			display: inline-block;
			float: right;
			margin-right: 15px;
			margin-top: 5px;
			text-transform: uppercase;
			font-weight: 800;
			color: #4c4c4c;
			background: none;
			padding: 10px 15px;
			border-radius: 4px;
		}

		.modal-footer .conf-but:hover {
			background: #eee;
			cursor: pointer;
			opacity: .8;
		}

		.modal-footer .conf-but.green {
			color: #26cf36;
		}
	</style>
</head>

<body style="padding:0; margin:0; background: #faf9f7;">
	<table cellspacing="0" cellpadding="0" width="100%" align="center" style="background: #faf9f7;">
		<tr>
			<td align="center" width="100%" style="max-width: 590px; min-width: 300px;">
				<table cellspacing="0" cellpadding="0" align="center" width="100%"
					style="max-width: 590px; min-width: 300px;">
					<tr>
						<td align="center">
							<table cellspacing="0" cellpadding="0" align="center" width="100%"
								style="max-width: 590px; min-width: 300px;">
								<tr>
									@if ($invitee->status == 'accept' || $invitee->status == 'reject')
									 <table cellspacing="0" cellpadding="0" align="center" width="100%"
										style="max-width: 590px; min-width: 300px; border-radius: 5px; -webkit-border-radius: 5px; border: 1px solid #e6e3e3; background-color: #fff;">
										<tr>
											<td>
												<table cellspacing="0" cellpadding="0" align="center" width="100%"
													height="50">
													<tr>
														<td></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td style="padding: 0 39px;">
												<div
													style="font-family: 'Helvetica Neue', sans-serif; font-weight: 400; font-size: 24px; color: #000000; line-height: 29px;">
													@if($invitee->getFirstLang() == 'eng')
														<p>Thanks for the answer</p>
													@elseif($invitee->getFirstLang() == 'ru')
														<p>Спасибо за ответ!</p>
													@elseif($invitee->getFirstLang() == 'kg')
														<p>Жооп бергениңиз үчүң рахмат!</p>
													@endif
												</div>
											</td>
										</tr>
										<tr>
											<td style="padding: 24px 39px 34px;">
												<div
													style="font-family: 'Helvetica Neue', sans-serif; font-weight: 400; font-size: 16px; color: #333333; line-height: 24px; text-indent: 12px">
													@if ($invitee->status == 'accept')
														<p>
															{!!$event->getAcceptAnswer($invitee->getFirstLang())!!}
														</p>
													@elseif ($invitee->status == 'reject')
														<p>
															{!!$event->getRejectAnswer($invitee->getFirstLang())!!}
														</p>
													@endif
												</div>
											</td>
										</tr>
									</table>
									@else
										<div class="modal overlay">
											<div class="conf-modal center success">
												{{-- <div class="title-icon">
													<img src="http://jimy.co/res/icon-success.jpg">
												</div> --}}
												<div class="title-text">
													@if($invitee->getFirstLang() == 'eng')
														<div class="title-text">
															<h1>Confirmation!</h1>
														</div>
														<p>Do you accept the invitation?</p>
													@elseif($invitee->getFirstLang() == 'ru')
														<div class="title-text">
															<h1>Потверждение!</h1>
														</div>
														<p>Примайте ли вы приглашение?</p>
													@elseif($invitee->getFirstLang() == 'kg')
														<div class="title-text">
															<h1>Тастыктоо!</h1>
														</div>
														<p>Чакырууну кабыл аласызбы?</p>
													@endif
												</div>
												
												<div class="modal-footer text-center">
													<div class="conf-but green" onClick="">
														<a style="text-decoration: none" href="{{route('web.invitation.answer', ['event_id' => $eventId, 'uniq_code' => $uniqCode, 'answer' => "accept"])}}">
															@if($invitee->getFirstLang() == 'eng')     Yes
															@elseif($invitee->getFirstLang() == 'ru')  Да
															@elseif($invitee->getFirstLang() == 'kg')  Ооба
															@endif
														</a>
													</div>
													<div class="conf-but" onClick="">
														<a style="text-decoration: none" href="{{route('web.invitation.answer', ['event_id' => $eventId, 'uniq_code' => $uniqCode, 'answer' => "reject"])}}">
															@if($invitee->getFirstLang() == 'eng')     No
															@elseif($invitee->getFirstLang() == 'ru')  Нет
															@elseif($invitee->getFirstLang() == 'kg')  Жок
															@endif
														</a>
													</div>
												</div>
											</div>
										</div>
									@endif
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		@if ($invitee->status != 'pending')
			<tr>
				<td>
				</td>
			</tr>
		@endif
	</table>
</body>

</html>