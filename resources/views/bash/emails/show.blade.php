@extends('bash.layouts.app')

@section('title', $email->name)

@section('subheader')
@component('bash.layouts.partials._subheader.subheader')
@slot('br_title')
@endslot
@slot('br_link_item') {{route('bash.emails.index')}} @endslot @slot('br_title_item') События @endslot
@endcomponent
@endsection

@section('content')

<div class="card card-custom">

	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">{{$email->name}}</h3>
		</div>
	</div>

	<div class="card-body py-4">
		<div class="form-group row my-2">
			<label class="col-4 col-form-label">Id:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->id}}</span>
			</div>
		</div>

		<div class="form-group row my-2">
			<label class="col-4 col-form-label">Mailer:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->mailer}}</span>
			</div>
		</div>

		<div class="form-group row my-2">
			<label class="col-4 col-form-label">Host:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->host}}</span>
			</div>
		</div>


		<div class="form-group row my-2">
			<label class="col-4 col-form-label">Port:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->port}}</span>
			</div>
		</div>

		<div class="form-group row my-2">
			<label class="col-4 col-form-label">Email:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->email}}</span>
			</div>
		</div>

		<div class="form-group row my-2">
			<label class="col-4 col-form-label">Шифрование:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->encryption}}</span>
			</div>
		</div>

		<div class="form-group row my-2">
			<label class="col-4 col-form-label">От адреса:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->from_address}}</span>
			</div>
		</div>

		<div class="form-group row my-2">
			<label class="col-4 col-form-label">От имени:</label>
			<div class="col-8">
				<span class="form-control-plaintext font-weight-bolder">{{$email->from_name}}</span>
			</div>
		</div>
	</div>
</div>

<div class="card-footer">
	<div class="row">
		<div class="col">
			<a href="{{route('bash.emails.index')}}" class="btn btn-secondary mr-2">Назад</a>
			<a href="{{route('bash.emails.edit', $email)}}" class="btn btn-primary">Редактировать</a>
		</div>
		<div class="col-md-auto">
			{!! Form::open(['method' => 'DELETE','route' => ['bash.emails.destroy', $email],'style'=>'display:inline',
			'onsubmit' => 'return confirmDelete()']) !!}
			<input type="hidden" value="Delete">
			<button class="btn btn-light-danger" type="submit">Удалить</button>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection