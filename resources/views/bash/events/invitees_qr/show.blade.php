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
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{$event->getAvialTitle()}}</h3>
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
                <label class="col-4 col-form-label">ФИО:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->full_name}}</span>
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Email:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->email}}</span>
                </div>
            </div>

			<div class="form-group border row mb-5 p-3">
                <label class="col-4 col-form-label">Организация:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->organization}}</span>
                </div>
            </div>

			<div class="form-group border row mb-5 p-2">
                <label class="col-4 col-form-label">Работа</label>
				<div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">{{$invitee->job}}</span>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{route('bash.index')}}" class="btn btn-primary mr-2">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection
