@extends('bash.layouts.app')

@section('title', "События - " . $event->getAvialTitle())

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
			События
        @endslot
        @slot('br_link_item') {{route('bash.events.index')}} @endslot @slot('br_title_item') Все события @endslot
    @endcomponent
@endsection

@section ('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection


@section('content')
    <div class="card card-custom">
        <div class="card-header flex-nowrap">
            <div class="card-title w-50">
                <h3 class="card-label">{{$event->getAvialTitle()}}</h3>
            </div>
			<div class="card-toolbar justify-content-end">
				<a data-title="Рассылать по Email" href="{{route('bash.events.send', $event)}}" class="mailing-btn btn btn-info font-weight-bolder mr-2">
					<i class="flaticon-email"></i>Рассылать по Email
				</a>
				<a href="{{route('bash.events.edit', $event)}}" class="btn btn-primary mr-2">
					Редактировать
				</a>
				<a href="{{route('bash.events.index')}}" class="btn btn-secondary">Назад</a>
			</div>
        </div>

       <div class="card-body py-4">

            <div class="form-group border row mb-5 p-2">
               <label class="col-4 col-form-label">ID:</label>
               <div class="col-8">
                   <span class="form-control-plaintext font-weight-bolder">{{$event->id}}</span>
               </div>
            </div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Название:</label>
				<div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#title_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#title_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#title_tab_ky" tabindex="-1" aria-disabled="true">
								<span class="nav-text">Кыргызча</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="title_tab_en" role="tabpanel" aria-labelledby="title_tab_1">
							{{$event->title_en}}
						</div>
						<div class="tab-pane fade" id="title_tab_ru" role="tabpanel" aria-labelledby="title_tab_2">
							{{$event->title_ru}}
						</div>
						<div class="tab-pane fade" id="title_tab_ky" role="tabpanel" aria-labelledby="title_tab_3">
							{{$event->title_ky}}
						</div>
					</div>
				</div>
            </div>

			<div class="form-group border row mb-5 p-2">
				<label class="col-4 col-form-label">Статус:</label>
				<div class="col-8">
					<span class="form-control-plaintext font-weight-bolder">{!!$event->getStatus()!!}</span>
				</div>
			</div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Список всех приглашённых гостей  по Email</label>
                <div class="col-8">
					<a href="{{route('bash.events.invitees.index', $event)}}"
						class="mt-1 btn btn-light-success btn-sm">посмотреть</a>
                </div>
            </div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Прогресс рассылок
					<span class="text-primary font-weight-bold">(отправлено)<span></p>
				</label>
                <div class="col-8 d-flex align-items-center">
					<div class="progress w-100">
						<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
								style="width: {{$pct}}%;" aria-valuenow="{{$pct}}" aria-valuemin="0" aria-valuemax="100">{{$pct}}%</div>
					</div>
                </div>
            </div>

			<div class="form-group border row mb-5 p-2">
				<label class="col-4 col-form-label">Статистика (Email)</label>
				<div class="col-8">
					<div class="table-responsive">
						<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
							<thead>
								<tr class="text-center">
									<th scope="col">Всего</th>
									<th scope="col">Рассылка отправлено</th>
									<th scope="col">Приняли</th>
									<th scope="col">Отвергли</th>
									<th scope="col">В ожидании</th>
								</tr>
							</thead>
							<tbody>
								<tr class="text-center">
									<td>
										<span class="label label-lg label-light-dark label-inline">
											{{$event->invitees->count()}}</span>
									</td>
									<td>
										<span class="label label-lg label-success label-inline">
											{{$event->getSendedInvites()->count()}}</span>
									</td>
									<td>
										<span class="label label-lg label-light-success label-inline">
											{{$event->getInviteesAccept()->count()}}</span>
									</td>
									<td>
										<span class="label label-lg label-light-danger label-inline">
											{{$event->getInviteesReject()->count()}}</span>
									</td>
									<td>
										<span class="label label-lg label-light-warning label-inline">
											{{$event->getInviteesPending()->count()}}</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">
					<p>Список всех приглашённых гостей по QR ссылке
						<span class="text-primary font-weight-bold">(все кто принял)<span></p>
				</label>
                <div class="col-8 d-flex align-items-center">
					<a href="{{route('bash.events.invitees_qr.index', $event)}}"
						class="btn btn-light-success btn-sm">посмотреть</a>
                </div>
            </div>

			<div class="form-group border row mb-5 p-2">
				<label class="col-4 col-form-label">Статистика (QR)</label>
				<div class="col-8">
					<div class="table-responsive">
						<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
							<thead>
								<tr class="text-center">
									<th scope="col">Всего</th>
									<th scope="col">Приняли</th>
									<th scope="col">Отвергли</th>
								</tr>
							</thead>
							<tbody>
								<tr class="text-center">
									<td>
										<span class="label label-lg label-light-dark label-inline">
											{{$event->getInviteesQrAccept()->count() + $event->getInviteesQrReject()->count()}}</span>
									</td>
									<td>
										<span class="label label-lg label-light-success label-inline">
											{{$event->getInviteesQrAccept()->count()}}</span>
									</td>
									<td>
										<span class="label label-lg label-light-danger label-inline">
											{{$event->getInviteesQrReject()->count()}}</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Описание:</label>
                <div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#description_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#description_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#description_tab_ky" tabindex="-1" aria-disabled="true">
								<span class="nav-text">Кыргызча</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="description_tab_en" role="tabpanel" aria-labelledby="description_tab_1">
							{!!$event->description_en!!}
						</div>
						<div class="tab-pane fade" id="description_tab_ru" role="tabpanel" aria-labelledby="description_tab_2">
							{!!$event->description_ru!!}
						</div>
						<div class="tab-pane fade" id="description_tab_ky" role="tabpanel" aria-labelledby="description_tab_3">
							{!!$event->description_ky!!}
						</div>
					</div>
                </div>
            </div>
			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Дата начало:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$event->start_date}}</span>
                </div>
            </div>
			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Время начало:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$event->start_time}}</span>
                </div>
            </div>
			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Прикрепленный файл:</label>
                <div class="col-8">
					<a href="{{asset($event->file_invitees)}}"
						class="mt-1 btn btn-light-success btn-sm">загрузить</a>
                </div>
            </div>	

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">QR ссылка</label>
                <div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#qr_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#qr_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#qr_tab_ky" tabindex="-1" aria-disabled="true">
								<span class="nav-text">Кыргызча</span>
							</a>
						</li>
					</ul>
					{{-- <div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="qr_tab_en" role="tabpanel">
							<img width="128" alt="qr_en_{{$event->title_en}}" src="data:image/png;base64,
								{!! base64_encode(
									QrCode::format('png')->size(512)->generate($event->qr_en)
								) !!} ">
						</div>
						<div class="tab-pane fade" id="qr_tab_ru" role="tabpanel">
							<img width="128" alt="qr_en_{{$event->title_ru}}" src="data:image/png;base64,
								{!! base64_encode(
									QrCode::format('png')->size(512)->generate($event->qr_ru)
								) !!} ">				
						</div>
						<div class="tab-pane fade" id="qr_tab_ky" role="tabpanel">
							<img width="128" alt="qr_ky_{{$event->title_ky}}" src="data:image/png;base64,
								{!! base64_encode(
									QrCode::format('png')->size(512)->generate($event->qr_ky)
								) !!} ">						
						</div> 
					</div> --}}
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="qr_tab_en" role="tabpanel">
							{!! QrCode::size(200)->generate($event->qr_en) !!}
						</div>
						<div class="tab-pane fade" id="qr_tab_ru" role="tabpanel">
							{!! QrCode::size(200)->generate($event->qr_ru) !!}
						</div>
						<div class="tab-pane fade" id="qr_tab_ky" role="tabpanel">
							{!! QrCode::size(200)->generate($event->qr_ky) !!}
						</div> 
					</div>
                </div>
            </div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">
					Текст ответа при <span class="text-success">принятие</span> приглашения
				</label>

                <div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#accept_answer_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#accept_answer_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#accept_answer_tab_ky" tabindex="-1" aria-disabled="true">
								<span class="nav-text">Кыргызча</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="accept_answer_tab_en" role="tabpanel">
							{!!$event->accept_answer_en!!}
						</div>
						<div class="tab-pane fade" id="accept_answer_tab_ru" role="tabpanel">
							{!!$event->accept_answer_ru!!}
						</div>
						<div class="tab-pane fade" id="accept_answer_tab_ky" role="tabpanel">
							{!!$event->accept_answer_ky!!}
						</div>
					</div>
                </div>
            </div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Текст ответа при <span class="text-danger">отказе</span> от приглашения:</label>
                <div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#reject_answer_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#reject_answer_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#reject_answer_tab_ky" tabindex="-1" aria-disabled="true">
								<span class="nav-text">Кыргызча</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="reject_answer_tab_en" role="tabpanel">
							{!!$event->reject_answer_en!!}
						</div>
						<div class="tab-pane fade" id="reject_answer_tab_ru" role="tabpanel">
							{!!$event->reject_answer_ru!!}
						</div>
						<div class="tab-pane fade" id="reject_answer_tab_ky" role="tabpanel">
							{!!$event->reject_answer_ky!!}
						</div>
					</div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{route('bash.events.index')}}" class="btn btn-secondary mr-2">Назад</a>
					<a href="{{route('bash.events.edit', $event)}}" class="btn btn-primary mr-2">
						Редактировать
					</a>
                </div>
                <div class="col-md-auto">
                    {!! Form::open(['method' => 'DELETE','route' => ['bash.events.destroy', $event],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                        <input type="hidden" value="Delete">
                        <button class="btn btn-light-danger" type="submit">Удалить</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.mailing-btn').confirm({
				title: "title",
				content: "Прежде чем начать рассылку убедитесь в корректности данных, в том числе списке приглашаемых гостей",
				buttons: {
					Продолжить: function(){
						var that = this;
						 $.confirm({
							title: "Потверждение",
							content: "Вы действительно хотите начать рассылку?",
							buttons: {
								Да: function() {
									location.href = that.$target.attr('href');
								},
								Отменить: function() {},
							} 
						}); 
					},
					Закрыть: function() {}
				}
			});
		});
	</script>
@endsection()

