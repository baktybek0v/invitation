@extends('bash.layouts.app')

@section('title', 'Панель управления')

@section('styles')
	<style>
		p {
			margin-bottom: 1rem;
		}

		.h-text li {
			margin-bottom: 12px;
		}

		ol li {
			margin: 7px 0;
		}
	</style>
@endsection

@section('subheader')
	@component('bash.layouts.partials._subheader.subheader')
		@slot('br_title')
		{{-- Панель управления--}}
		@endslot
		@slot('br_link_item') @endslot
		@slot('br_title_item') @endslot
		@slot('br_item_next') @endslot
	@endcomponent
@endsection

@section('content')
{{-- @if(session('status_update'))
	<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
		<div class="alert-icon"><i class="flaticon-warning"></i></div>
		<div class="alert-text">
			{{ session('status_update') }}
		</div>
		<div class="alert-close">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="ki ki-close"></i></span>
			</button>
		</div>
	</div>
@endif --}}

<!-- Modal-->
<form action="{{route('bash.emails.set')}}" method="post">
	@csrf
	<div class="modal fade mb-2" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-label">Почта для рассылки</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="d-flex justify-content-between align-items-center">
						<label>Email<span class="text-danger text-right">*</span></label>
						<select id="email" class="selectpicker w-75" name="email">
							@foreach ($emails as $item)
								@if ($sender && $item->email == $sender->email)
									<option selected="selected" value="{{$item->email}}">
										{{$item->email}} <span class="text-danger">(текущий)</span>
									</option>
								@else
									<option value="{{$item->email}}">
										{{$item->email}}
									</option>
								@endif
							@endforeach
						</select>	
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold"
						data-dismiss="modal">Закрыть</button>
					<button type="submit" class="btn btn-primary font-weight-bold">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
</form>

{{-- Content Body --}}
<div class="row">
	<div class="col-12 col-md-4">
		<div class="card card-custom gutter-b">
			<div class="card-body">		
				<span class="d-block text-muted mb-5 font-weight-bold">Текущая почта для рассылок</span>
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
					<a href="#" class="text-muted text-hover-primary">
						{{$sender->email ?? ""}}
					</a>
				</div>
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-dark-75 font-weight-bolder mr-2">Хост:</span>
					<a href="#" class="text-muted text-hover-primary">
						{{$sender->host ?? ""}}
					</a>
				</div>
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-dark-75 font-weight-bolder mr-2">Шифрование:</span>
					<a href="#" class="text-muted text-hover-primary">
						{{$sender->encryption ?? ""}}
					</a>
				</div>
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-dark-75 font-weight-bolder mr-2">Порт:</span>
					<a href="#" class="text-muted text-hover-primary">
						{{$sender->port ?? ""}}
					</a>
				</div>
				<div class="d-flex justify-content-between align-items-center mb-5">
					<span class="text-dark-75 font-weight-bolder mr-2">Создан:</span>
					<a href="#" class="text-muted text-hover-primary">
						{{$sender ? $sender->getCreatedAt() : ""}}
					</a>
				</div>
				<a data-target="#modal" data-toggle="modal" class="d-block btn btn-sm btn-light-success font-weight-bolder text-uppercase py-4 px-7">Изменить</a>

				<hr>

				<span class="d-block card-label font-weight-bolder text-dark">Справочная информация</span>
				<span class="text-muted mt-3 font-weight-bold font-size-sm">Информационные .docx файлы</span>

				<div class="card-body pt-4 px-2">
					<!--begin::Container-->
					<div>
						<!--begin::Item-->
						<div class="d-flex align-items-end mb-8">
							<div class="symbol mr-5 pt-1">
								<div class="symbol-label min-w-65px min-h-125px" style="background-image: url({{asset('assets/page/info_docx_logo.svg')}}); background-size: contain;"></div>
							</div>
							<div class="d-flex flex-column">
								<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Язык предпочтение</a>
								<span class="text-muted font-weight-bold font-size-sm pb-4">
									На каком языке будет показан имя событии, текст потверждение и т.д.
								</span>
								<div>
									<a href="{{asset('assets/page/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.docx')}}" class="btn btn-light-danger font-weight-bolder font-size-sm py-2">Читать подробнее</a>
								</div>
							</div>
						</div>
						<!--end::Item-->
						<div class="d-flex align-items-end mb-8">
							<div class="symbol mr-5 pt-1">
								<div class="symbol-label min-w-65px min-h-125px" style="background-image: url({{asset('assets/page/info_docx_logo.svg')}}); background-size: contain;"></div>
							</div>
							<div class="d-flex flex-column">
								<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Добавить почту для рассылки</a>
								<span class="text-muted font-weight-bold font-size-sm pb-4">
									Инструкция по добавлению
								</span>
								<div>
									<a href="{{asset('assets/page/Q9xax925i5rKhrU66kKnG_GTQWJQNi4TFj3qXJb6TJE.docx')}}" class="btn btn-light-danger font-weight-bolder font-size-sm py-2">Читать подробнее</a>
								</div>
							</div>
						</div>
					</div>
					<!--end::Container-->
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		@if ($emails->count() < 1)
			<div class="card card-custom gutter-b" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Нет ни одной почты для рассылки</h3>
					</div>
					<a href="{{route('bash.emails.create')}}" class="btn btn-primary font-weight-bold py-3 px-6">Создать</a>
				</div>
			</div>
		@elseif ($emails->count() > 0 && !$sender)
			<div class="card card-custom gutter-b" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Почта для рассылки не установлено</h3>
					</div>
					<a data-target="#modal" data-toggle="modal" class="btn btn-primary font-weight-bold py-3 px-6">Установить</a>
				</div>
			</div>
		@endif
		{{-- КОНЕЦ --}}

		@if (count($events) > 0)
			<div class="card card-custom gutter-b">
				<!--begin::Header-->
				<div class="card-header border-0 py-5">
					<h3 class="card-title font-weight-bolder text-dark">Последние события</h3>

					<div class="card-toolbar">
						<a href="{{route('bash.events.create')}}"
							class="d-flex align-items-end btn btn-success font-weight-bolder font-size-sm">
							<span class="svg-icon svg-icon-md svg-icon-white">
								<svg>
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path
											d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
											fill="#000000" fill-rule="nonzero" opacity="0.3" />
										<path
											d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
											fill="#000000" />
									</g>
								</svg>
							</span>Создать новую</a>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-head-custom" id="kt_advance_table_widget_1">
							<thead>
								<tr class="text-left">
									<th class="pl-0" style="width: 0%">Дата</th>
									<th class="pl-0" style="width: 5%"></th>
									<th class="pl-0" style="width: 300px">Наименование</th>
									<th class="text-center" style="width: 0">Согласились</th>
									<th class="text-center" style="width: 0">Отказались</th>
									<th class="text-center" style="width: 0">Ожидание</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($events as $event)
								<tr>
									<td class="pl-0" style="max-width: 100px">
										<div class="symbol symbol-50 symbol-light mt-1">
											<span class="symbol-label text-primary bold font-size-h1">
												<span>{{$event->getDayOfMonth()}}</span>
											</span>
										</div>
									</td>

									<td class="pl-0 pt-6">
										<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"></a>
										<span class="text-muted font-weight-bold text-muted d-block">{{$event->getMonthName()}}</span>
										<span class="text-muted font-weight-bold text-muted d-block">{{$event->getYear()}}</span>
									</td>

									<td class="pl-0">
										<a href="{{route('bash.events.show', $event)}}" title="{{$event->getAvialTitle()}}" data-toggle="tooltip" data-placement="right"
											class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
											{{ \Illuminate\Support\Str::limit($event->getAvialTitle() ?? '', 60,' ...')}}
										</a>
									</td>
									
									{{-- Согласились::Start --}}
									<td class="text-center">
										<div class="drop-up">
											<button type="button"
												class="btn btn-outline-success dropdown-toggle mr-1" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												{{$event->getInviteesAccept()->count()}}
											</button>
											<div class="label label-light font-bold align-middle">
												<img class="mw-100" src="https://www.iconpacks.net/icons/1/free-mail-icon-142-thumb.png" alt="">
											</div>
											<div class="dropdown-menu">
												@foreach ($event->getInviteesAccept()->take($eventLimit) as $invitee)
													<a href="{{route('bash.events.invitees.show', [$event, $invitee])}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">{{$invitee->email}}</span>
														<span class="ml-1">{{$invitee->getAvialFullName()}}</span>
													</a>
												@endforeach
												@if ($event->getInviteesAccept()->count() > $eventLimit)
													<a href="{{route('bash.events.invitees.index', $event)}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">посмотреть всех</span>
													</a>
												@endif
											</div>
										</div>

										<hr>

										<div class="drop-up">
											<button type="button"
												class="btn btn-outline-success dropdown-toggle mr-1" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												{{$event->getInviteesQrAccept()->count()}}
											</button>
											<div class="label label-light align-middle">
												<img class="mw-100" src="https://cdn-icons-png.flaticon.com/512/3697/3697124.png" alt="">
											</div>
											<div class="dropdown-menu">
												@foreach ($event->getInviteesQrAccept()->take($eventLimit) as $invitee)
													<a href="{{route('bash.events.invitees_qr.show', [$event, $invitee])}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">{{$invitee->email}}</span>
														<span class="ml-1">{{$invitee->full_name}}</span>
													</a>
												@endforeach
												@if ($event->getInviteesQrAccept()->count() > $eventLimit)
													<a href="{{route('bash.events.invitees_qr.index', $event)}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">посмотреть всех</span>
													</a>
												@endif
											</div>
										</div>
									</td>
									{{-- Согласились::End --}}

									{{-- Отказались::Start --}}
									<td class="text-center">
									 	<div class="drop-up">
											<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												{{$event->getInviteesReject()->count()}}
											</button>
											<div class="label label-light font-bold align-middle">
												<img class="mw-100" src="https://www.iconpacks.net/icons/1/free-mail-icon-142-thumb.png" alt="">
											</div>
											<div class="dropdown-menu">
												@foreach ($event->getInviteesReject()->take($eventLimit) as $invitee)
													<a href="{{route('bash.events.invitees.show', [$event, $invitee])}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">{{$invitee->email}}</span>
														<span class="ml-1">{{$invitee->getAvialFullName()}}</span>
													</a>
												@endforeach
												@if ($event->getInviteesReject()->count() > $eventLimit)
												<a href="{{route('bash.events.invitees.index', $event)}}" class="dropdown-item px-8">
													<span class="mr-1 text-primary">посмотреть всех</span>
												</a>
												@endif
											</div>
										</div>

										<hr>

										<div class="drop-up">
											<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												{{$event->getInviteesQrReject()->count()}}
											</button>
											<div class="label label-light align-middle">
												<img class="mw-100" src="https://cdn-icons-png.flaticon.com/512/3697/3697124.png" alt="">
											</div>
											<div class="dropdown-menu">
												<a href="{{route('bash.events.invitees_qr.index', $event)}}" class="dropdown-item px-8">
													<span class="mr-1 text-primary">посмотреть всех</span>
												</a>
											</div>
										</div>
									</td>
									{{-- Отказались::End --}}

									
									{{-- В Ожидании::Start --}}
									<td class="text-center">
										<div class="drop-up">
											<button type="button"
												class="btn btn-outline-warning dropdown-toggle" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												{{$event->getInviteesPending()->count()}}
											</button>
											<div class="dropdown-menu">
												@foreach ($event->getInviteesPending()->take($eventLimit) as $invitee)
													<a href="{{route('bash.events.invitees.show', [$event, $invitee])}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">{{$invitee->email}}</span>
														<span class="ml-1">{{$invitee->getAvialFullName()}}</span>
													</a>
												@endforeach
												@if ($event->getInviteesPending()->count() > $eventLimit)
													<a href="{{route('bash.events.invitees.index', $event)}}" class="dropdown-item px-8">
														<span class="mr-1 text-primary">посмотреть всех</span>
													</a>
												@endif
											</div>
										</div>
									</td>
									{{-- В Ожидании::End --}}
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="card-footer px-0">
						<a href="{{route('bash.events.index')}}" class="btn btn-outline-primary">Посмотреть все события</a>
					</div>
				</div>
				<!--end::Body-->
			</div>
		@elseif ($sender && isset($sender))
			<div class="card card-custom gutter-b" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Нет ни одной созданных событий</h3>
						<div class="text-dark-50 font-size-lg mt-2">Создайте прямо сейчас</div>
					</div>
					<a href="{{route('bash.events.create')}}" class="btn btn-primary font-weight-bold py-3 px-6">Начать</a>
				</div>	
			</div>
		@endif
	</div>
</div>

<!-- Как добавить свою почту для рассылки::Begin -->
<div class="row">
	<div class="col-md-12">
		<div class="card card-custom gutter-b">
			<div class="mt-7 mx-7">
				<h3 class="m-0 card-title font-weight-bolder text-dark ">
					Генерация пароля для почтовых служб!
				</h3>
				{{-- <div class="alert alert-custom alert-notice alert-light-danger" role="alert">
					<div class="alert-icon"><i class="flaticon-warning"></i></div>
					<div class="alert-text font-weight-bold font-size-h6">
						При <a class="text-primary" href="{{route('bash.emails.create')}}">добавление почты</a> вместо оригинального пароля нужно использовать сгенерированный пароль, как это сделать для различных почтовых служб показано ниже
					</div>
				</div> --}}
			</div>
			<div class="card-header card-header-tabs-line nav-tabs-line-3x">
				<div class="card-toolbar align-items-end">
					<ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
						<li class="nav-item">
							<a class="nav-link py-4 active" data-toggle="tab" href="#kt_tab_pane_1_4">
								<img class="mr-2" src="{{asset('assets/page/mail_ru_logo.svg')}}" width="20" height="20" alt="">
								<span class="nav-text font-weight-bold">Mail</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-4" data-toggle="tab" href="#kt_tab_pane_2_4">
								<img class="mr-2" src="{{asset('assets/page/gmail_logo.svg')}}" width="20" height="20" alt="">
								<span class="nav-text font-weight-bold">Gmail</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-4" data-toggle="tab" href="#kt_tab_pane_3_4">
								<img class="mr-2" src="{{asset('assets/page/outlook_logo.svg')}}" width="20" height="20" alt="">
								<span class="nav-text font-weight-bold">Outlook</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel"
								aria-labelledby="kt_tab_pane_1_4">
								<h2>Создать пароль для внешнего приложения mail.ru</h2>
								<div class="alert alert-custom alert-notice alert-light-info mb-5 p-5" role="alert">
									<div class="alert-icon"><i class="flaticon-info"></i></div>
									<div class="alert-text text-dark">
										Пароль для внешнего приложения можно создать, только если к почте привязан номер телефона. Перед
										созданием пароля&nbsp;<a href="https://id.mail.ru/contacts" target="_blank">проверьте</a>,
										привязана ли почта к вашему номеру.
										Если нет, привяжите.&nbsp;<a href="https://help.mail.ru/mail/questions/phone">Как это сделать?</a>
									</div>
								</div>
								<p></p>
								<p><span><span>Чтобы создать пароль для внешнего приложения:</span></span></p>
								<ol>
									<li>Перейдите в настройки <a href="https://id.mail.ru/" target="_blank">Mail ID</a>&nbsp;→ «<a
											href="https://id.mail.ru/security" target="_blank">Безопасность</a>»&nbsp;→ «<a
											href="https://account.mail.ru/user/2-step-auth/passwords/">Пароли для внешних
											приложений</a>».&nbsp;</li>
									<li>Нажмите <img src="{{asset('assets/page/3161ea17bb5f56fc6d3478c67116cc19.png')}}" width="84"
											height="35" alt="image" class="ipic">.</li>
									<li>Введите название приложения, чтобы не забыть, для какой программы пароль.</li>
									<li><span>Скопируйте сгенерированный код.</span></li>
									<li><span>Введите его вместо вашего пароля mail.ru при <a href="{{route('bash.emails.create')}}">добавление почты</a> для рассылки</span></li>
								</ol>
								<p>Прочитать статью <a href="https://help.mail.ru/mail/security/protection/external">"Пароли для внешних приложений"</a> полностью</p>
							</div>
				
							<div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
								<h2>Создать пароль для внешнего приложения gmail.com</h2>
								<div class="alert alert-custom alert-notice alert-light-info mb-5 p-5" role="alert">
									<div class="alert-icon"><i class="flaticon-info"></i></div>
									<div class="alert-text text-dark">
										Пароль для внешнего приложения можно создать, только если у вас включена двухэтапная аутентификация. Перед
										созданием пароля&nbsp;<a href="https://myaccount.google.com/security" target="_blank">проверьте</a>,
										включена ли у вас двухэтапная аутентификация.
										Если нет, привяжите.&nbsp;<a href="https://myaccount.google.com/signinoptions/two-step-verification">Как это сделать?</a>
									</div>
								</div>
								<p>Чтобы создать пароль для внешнего приложения:</p>
								<ol>
									<li>откройте страницу <a href="https://myaccount.google.com/" target="_blank">Аккаунт Google</a></li>
									<li>Нажмите <b>Безопасносить</b></li>
									<li>В разделе "Вход в аккаунт Google" выберите <b>Пароли приложений</b>. При необходимости выполните вход</li>
									<li>
										В нижней части страницы нажмите <b>Приложение</b> и выберите
										нужный вариант <i class="flaticon2-next font-size-sm"></i> затем нажмите <b>Устройство</b> и укажите
										модель затем <i class="flaticon2-next font-size-sm"></i> <b>Создать</b>
									</li>
									<li><span>Скопируйте сгенерированный код.</span></li>
									<li><span>Введите его вместо вашего пароля gmail.com при <a href="{{route('bash.emails.create')}}">добавление почты</a> для рассылки</span></li>
								</ol>
								<p>Прочитать статью <a href="https://support.google.com/accounts/answer/185833?hl=ru#zippy=">"Как войти в аккаунт с помощью паролей приложений"</a> полностью</p>
							</div>
							
							<div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
								<h2 class="mb-5">Создать пароль для внешнего приложения outlook.com</h2>
								<p>Чтобы создать пароль для внешнего приложения:</p>
								<ol>
									<li>Выберите свое имя или аватарку в верхней панели навигации Outlook.com, а затем выберите <b>Моя учетная запись</b> </li>
									<li>Прокрутите вниз и выберите <b>Обновить»</b> в разделе <b>Безопасность</b>.</li>
									<li>На экране <b>Основы безопасности</b> выберите <b>дополнительные параметры безопасности</b> внизу.</li>
									<li>Прокрутите вниз и нажмите <b>Настройка двухэтапного подтверждения</b></li>
									<li>Запустите мастер настройки <b>двухэтапной проверки</b>, нажав Далее</li>
									<li>На следующем экране вам будет предложено настроить приложение Microsoft Authenticator, которое позволит вам нажать на уведомление об утверждении, чтобы предоставить приложению доступ к вашей учетной записи Outlook (пароль или код не требуются). В наших целях выберите <b>Отмена</b>, чтобы перейти к настройке двухэтапной проверки.</li>
									<li>Следуйте инструкциям, чтобы включить двухэтапную проверку</li>
									<li>На третьем шаге мастера вы увидите возможность настроить с помощью пароля приложения. Выберите тип вашего устройства</li>
									<li>Следуйте инструкциям на экране, чтобы завершить настройку. После того, как вы настроили пароль приложения, вы можете использовать его в своем приложении или изменить его, когда захотите</li>
									<li><span>Скопируйте сгенерированный код</span></li>
									<li><span>Введите его вместо вашего пароля outlook.com при <a href="{{route('bash.emails.create')}}">добавление почты</a> для рассылки</span></li>
								</ol>
								<p>Прочитать статью <a href="https://gadgetshelp.com/how-to/kak-sozdat-paroli-prilozheniia-dlia-outlook-com/">"Как создать пароли приложения для Outlook.com"</a> полностью</p>
							</div>
							<div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
								actions
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Как добавить свою почту для рассылки::End -->


@endsection


@section('scripts')
	<script>
		$(function () {
			$('a[data-toggle="tooltip"]').tooltip({
				container: 'body'
			});
		})
		
	</script>
@endsection