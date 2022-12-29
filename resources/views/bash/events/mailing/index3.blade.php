<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
			background: rgb(219, 231, 241);
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:800px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #dbe7f1; margin: 0 !important; padding: 0 !important;">
    

	@foreach ($invitee->getAllLang() as $lang)
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<!-- LOGO -->
			{{-- home town --}}
			<tr>
				<td bgcolor="#dbe7f1" align="center">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
						<tr>
							<td align="center" valign="top" style="padding: 0px 10px 40px 10px;"></td>
						</tr>
					</table>
				</td>
			</tr>

			{{-- main header left --}}
			<tr>
				<td bgcolor="#dbe7f1" align="center" style="padding: 0px 10px 0px 10px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
						<tr>
							<td align="left" bgcolor="#ffffff" style="width: 50%; padding: 0 20px 0 20px; border-radius: 4px 4px 0px 0px;">
								@if 	($lang == 'eng') <img src="{{$message->embed(public_path() . '/img/template/30_en.png')}}" width="120" style="max-width: 120px; display: block; border: 0px;" />
								@elseif ($lang == "ru")  <img src="{{$message->embed(public_path() . '/img/template/30_ru.png')}}" width="120" style="max-width: 120px; display: block; border: 0px;" />
								@elseif ($lang == "kg")  <img src="{{$message->embed(public_path() . '/img/template/30_ky.png')}}" width="120" style="max-width: 120px; display: block; border: 0px;" />
								@endif
							</td>
							<td align="right" bgcolor="#ffffff" style="width: 50%;  padding: 0 20px 0 20px; border-radius: 4px 4px 0px 0px;">
								<img src="{{$message->embed(public_path() . '/img/undp-logo.png')}}" height="100" style="max-height: 100px; display: block; border: 0px;" />
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td bgcolor="#dbe7f1" align="center" style="padding: 0px 10px 0px 10px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
						<tr>
							<td bgcolor="#ffffff" align="center" valign="top" style="padding-top: 30px; border-radius: 4px 4px 0px 0px; color: #3993ac; font-family: Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 14px; font-weight: 600; line-height: 32px;">
								<img src="{{$message->embed(public_path() . '/img/template/up.png')}}" width="200" style="display: block; border: 0px;" />

								<p style="font-style: italic; color: #3993ac; !important" >

									@if ($lang == 'eng') 
										{{$invitee->getTitle($lang)}} {{$invitee->getFullName($lang)}}, <br>
										Ms. Louise Chamberlain, <br>
										UNDP Resident Representative in the Kyrgyz Republic <br>
										requests the pleasure of your company <br>
										to the commemoration of the 30th Anniversary of <br>
										Development Cooperation in the Kyrgyz Republic <br>
										on Tuesday, November 22, 2022 from 18:00 to 20:30 <br>
										at the Kyrgyz Opera and Ballet Theatre (167 Abdrakhmanov Street) <br>
									@elseif ($lang == "ru") 
										{{$invitee->getTitle($lang)}} {{$invitee->getFullName($lang)}}, <br>
										Постоянный Представитель ПРООН в Кыргызской Республике <br>
										г-жа Луиз Чемберлен <br>
										имеет честь пригласить Вас <br>
										на торжественное мероприятие по случаю <br>
										празднования 30-летнего юбилея сотрудничества <br>
										в области развития в Кыргызской Республике, <br>
										во вторник 22 ноября 2022 года, с 18:00 до 20:30, <br>
										в здании Кыргызского Театра Оперы и Балета по адресу ул. Абдрахманова 167. <br>
									@elseif ($lang == "kg") 
										{{$invitee->getTitle($lang)}} {{$invitee->getFullName($lang)}}, <br>
										Сизди Бириккен Улуттар Уюмунун Өнүктүрүү Программасынын <br>
										Кыргыз Республикасындагы Туруктуу өкүлү Луиз Чемберлен айым <br>
										2022 жылдын 22-ноябрда, саат 18.00-20.30да <br>
										Кыргыз улуттук опера жана балет театрында өтө турган <br>
										Кыргыз Республикасында өнүктүрүү тармагында кызматташтыктын <br>
										30-жылдык мааракесине арналган майрамдык иш-чарага терең урматтоо менен чакырат <br>
										Дареги: Абдрахманов көчөсү 167, Бишкек шаары <br>
									@endif
									
								</p>
								<img src="{{$message->embed(public_path() . '/img/template/down.png')}}" width="330" style="display: block; border: 0px;" />
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td bgcolor="#dbe7f1" align="center" style="padding: 0px 10px 0px 10px;">
					<table class="row" role="presentation" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; max-width: 800px;" width="100%">
						<tr>
							<td class="col-12 col-sm-4" align="center" bgcolor="#ffffff" style="padding: 30px 20px 0 20px; border-radius: 4px 4px 0px 0px; font-size: 14px;">
								@if ($lang == 'eng') 
									<img src="{{$message->embed(public_path() . '/img/template/qr_en.png')}}" width="80" style="text-align: center; border: 0px;" />
									<p style="text-align:center; font-family: 'Lato', Helvetica, Arial, sans-serif; font-weight: 700; color: #001243">
										Scan to RSVP online
									</p>

								@elseif ($lang == "ru") 
									<img src="{{$message->embed(public_path() . '/img/template/qr_ru.png')}}" width="80" style="text-align: center; border: 0px;" />
									<p style="text-align:center; font-family: 'Lato', Helvetica, Arial, sans-serif; font-weight: 700; color: #001243">
										Просьба подтвердить<br>Ваше участие по ссылке:
									</p>

								@elseif ($lang == "kg")  
									<img src="{{$message->embed(public_path() . '/img/template/qr_ky.png')}}" width="80" style="text-align: center; border: 0px;" />
									<p style="text-align:center; font-family: 'Lato', Helvetica, Arial, sans-serif; font-weight: 700; color: #001243">
										Катышуунузду ырастоо <br>бул шилтеме аркылуу
									</p>
								@endif
							</td>
							<td class="col-12 col-sm-4" align="center" bgcolor="#ffffff" style="padding: 90px 20px 0 20px; border-radius: 4px 4px 0px 0px; font-family: Helvetica, Arial, sans-serif; font-style: italic">
								@if ($lang == 'eng')
									<p style="color: rgb(57, 147, 172); font-size: 13px; line-height: 22px; text-align: center">Event languages: <br>
										<span style="rgb(23, 68, 105); font-weight: bold; ">Kyrgyz</span>,
										<span style="rgb(23, 68, 105); font-weight: bold; ">Russian</span>,
										<span style="rgb(23, 68, 105); font-weight: bold; ">English</span>
									</p>

								@elseif ($lang == "ru")  
									<p style="color: rgb(57, 147, 172); font-size: 13px; line-height: 22px; text-align: center">Язык мероприятия: <br>
										<span style="rgb(23, 68, 105); font-weight: bold; ">кыргызский</span>,
										<span style="rgb(23, 68, 105); font-weight: bold; ">русский</span>,
										<span style="rgb(23, 68, 105); font-weight: bold; ">английский</span>
									</p>

								@elseif ($lang == "kg")
									<p style="color: rgb(57, 147, 172); font-size: 13px; line-height: 22px; text-align: center">Иш-чара:
										<span style="rgb(23, 68, 105); font-weight: bold; ">кыргыз</span>,
										<span style="rgb(23, 68, 105); font-weight: bold; ">орус</span> жана
										<span style="rgb(23, 68, 105); font-weight: bold; ">англис</span> <br>
										тилдеринде өтөт
									</p>
								@endif
							</td>
							<td class="col-12 col-sm-4" align="right" bgcolor="#ffffff" style="padding: 90px 20px 0 20px; border-radius: 4px 4px 0px 0px;">
								<p class="blue-dark small-size" style="font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 13px; color: #001243;">
									@if 	($lang == 'eng') Business Attire
									@elseif ($lang == "ru")  Форма одежды - <br> деловой стиль
									@elseif ($lang == "kg")  Кийим стили - <br> Ишкердик
									@endif
								</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	@endforeach

    

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
            <td bgcolor="#dbe7f1" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#2866ec">
													<a href="{{route('web.invitation', ["event_id" => $event->id, "uniq_code" => $invitee->uniq_code])}}"
														target="_blank" style="font-size: 16px; font-family: Lato, Helvetica, Arial, sans-serif; color: #ffffff;  text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #2866ec; display: inline-block;">
														@if ($invitee->getFirstLang() == 'eng')    Answer the invitation
														@elseif ($invitee->getFirstLang() == 'ru') Ответить на приглашение
														@elseif ($invitee->getFirstLang() == 'kg') Чакырууга жооп берүү
														@endif
													</a>
												</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#dbe7f1" align="center" style="padding: 0px 10px 20px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;">
                    <tr>
                        <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;"> <br>
                            <p style="margin: 0;">
								@if 	($invitee->getFirstLang() == 'eng') This message was sent from:
								@elseif ($invitee->getFirstLang() == 'ru')  Это письмо был отправлен от:
								@elseif ($invitee->getFirstLang() == 'kg')  Бул катты жөнөткөн:
								@else										Это письмо был отправлен от:
								@endif
								<a href="#" target="_blank" style="color: #111111; font-weight: 700;">{{env('MAIL_USERNAME')}}</a>
							</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
	</table>
</body>

</html>