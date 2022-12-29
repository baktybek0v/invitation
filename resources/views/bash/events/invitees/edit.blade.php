@extends('bash.layouts.app')

@section('title', "Редактирования событии")

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
			Редактировать
        @endslot
        @slot('br_link_item') {{route('bash.events.index')}} @endslot @slot('br_title_item') Все сыбытия @endslot
    @endcomponent
@endsection

@section('content')
	<div class="card card-custom">
		<div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
					Редактирование
					<a href="{{route('bash.events.show', $event)}}" class="text-primary">{{$event->getAvialTitle()}}</a>
				</h3>
            </div>
        </div>

		<div class="card-body">
			<div class="alert alert-custom alert-outline-danger fade show mb-7" role="alert">
				<div class="alert-icon"><i class="flaticon-warning"></i></div>
				<div class="alert-text">
					Поля отмеченные звездочкой
						(<span class="text-danger">*</span>)
					обязательны для заполнения !
				</div>
				<div class="alert-close">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="ki ki-close"></i></span>
					</button>
				</div>
			</div>
					
            <!-- errors -->
            @if (count($errors) > 0)
                <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endif

			{!! Form::model($invitee,
					['route' => array('bash.events.invitees.update', ['event' => $event, 'invitee' => $invitee]),
					 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        		@include('bash.events.invitees.form', $invitee)
        	{!! Form::close() !!}
        </div>
	</div>
@endsection
