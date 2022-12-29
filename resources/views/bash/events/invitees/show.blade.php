@extends('bash.layouts.app')

@section('title', $invitee->name)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        @endslot
        @slot('br_link_item') {{route('bash.index')}} @endslot @slot('br_title_item') Главная  @endslot
    @endcomponent
@endsection

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-nowrap">
            <div class="card-title w-50">
                <h3 class="card-label">
					<a href="{{route('bash.events.show', $event)}}">{{$event->getAvialTitle()}}</a>
				</h3>
            </div>
			<div class="card-toolbar justify-content-end">
				<a href="{{route('bash.events.invitees.edit',  ['event' => $event, 'invitee' => $invitee])}}" class="btn btn-primary mr-2">
					Редактировать
				</a>
				<a href="{{route('bash.events.invitees.index', ['event' => $event])}}" class="btn btn-secondary mr-2">Назад</a>
			</div>
        </div>

       <div class="card-body py-4">
		<div class="form-group border row mb-5 p-3">
			<label class="col-4 col-form-label">Id:</label>
               <div class="col-8">
                   <span class="form-control-plaintext font-weight-bolder">{{$invitee->id}}</span>
               </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Номер в списке:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->number}}</span>
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Email:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->email}}</span>
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Дублирование:</label>
                <div class="col-8 d-flex align-items-center">
                    {!!$invitee->getDuplicate()!!}
                </div>
            </div>


{{-- 			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Список всех событий в которых был приглашён</label>
                <div class="col-8 align-baseline">
					<a href="#" class="mt-1 btn btn-light-success btn-sm align-baseline">посмотреть</a>
					<span class="text-danger align-baseline">пока не доступно</span>
                </div>
            </div> --}}

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Полное имя:</label>
				<div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#full_name_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#full_name_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="full_name_tab_en" role="tabpanel">
							{{$invitee->full_name_en}}
						</div>
						<div class="tab-pane fade" id="full_name_tab_ru" role="tabpanel">
							{{$invitee->full_name_ru}}
						</div>
					</div>
				</div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Языки:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->languages}}</span>
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Рассылка (статус):</label>
                <div class="col-8 d-flex align-items-center">
                    {!!$invitee->getSended()!!}
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Приглашения (статус):</label>
                <div class="col-8 d-flex align-items-center">
                    {!!$invitee->getStatus()!!}
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Обращение:</label>
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
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="title_tab_en" role="tabpanel">
							{{$invitee->title_en}}
						</div>
						<div class="tab-pane fade" id="title_tab_ru" role="tabpanel">
							{{$invitee->title_ru}}
						</div>
					</div>
				</div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Организация:</label>
				<div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#organization_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#organization_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="organization_tab_en" role="tabpanel">
							{{$invitee->organization_en}}
						</div>
						<div class="tab-pane fade" id="organization_tab_ru" role="tabpanel">
							{{$invitee->organization_ru}}
						</div>
					</div>
				</div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Место работы:</label>
				<div class="col-8">
					<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#job_tab_en">
								<span class="nav-text">English</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#job_tab_ru">
								<span class="nav-text">Русский</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5">
						<div class="tab-pane fade active show" id="job_tab_en" role="tabpanel">
							{{$invitee->job_en}}
						</div>
						<div class="tab-pane fade" id="job_tab_ru" role="tabpanel">
							{{$invitee->job_ru}}
						</div>
					</div>
				</div>
            </div>
        </div>
		<div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{route('bash.events.invitees.index', ['event' => $event])}}" class="btn btn-secondary mr-2">Назад</a>
					<a href="{{route('bash.events.invitees.edit',  ['event' => $event, 'invitee' => $invitee])}}" class="btn btn-primary mr-2">
						Редактировать
					</a>
                </div>
                <div class="col-md-auto">
                    {!! Form::open(['method' => 'DELETE','route' => ['bash.events.invitees.destroy', ['event' => $event, 'invitee' => $invitee]],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                        <input type="hidden" value="Delete">
                        <button class="btn btn-light-danger" type="submit">Удалить</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
