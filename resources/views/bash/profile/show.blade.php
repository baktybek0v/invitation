@extends('bash.layouts.app')

@section('title', 'Профиль')

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        Профиль
        @endslot
        @slot('br_link_item')  @endslot @slot('br_title_item')  @endslot
    @endcomponent
@endsection


@section('content')
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
@if(session('status_update'))
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

@endif
{!! Form::model($user, ['route' => ['bash.profile.update'], 'method' => 'POST' ]) !!}
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Основная информация</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3">Логин</label>
                <div class="col-12 col-md-9">
                    {!! Form::text('login', null, array('class' => 'form-control', 'disabled')) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Имя <span class="text-danger">*</span></label>
                <div class="col-12 col-md-9">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Email <span class="text-danger">*</span></label>
                <div class="col-12 col-md-9">
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Номер телефона</label>
                <div class="col-12 col-md-9">
                    {!! Form::text('phone', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary font-weight-bold">Потвердить</button>
                </div>
            </div>
        </div>

        {{--<div class="card-footer d-flex justify-content-end">
        </div>--}}
    </div>
{!! Form::close() !!}
{!! Form::model($user, ['route' => ['bash.profile.change.password', $user], 'method' => 'POST']) !!}
    <div class="card card-custom mt-4">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Обновить пароль</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3">Текущий пароль</label>
                <div class="col-12 col-md-9">
                    {!! Form::password('current_password', array('placeholder' => 'Текущий пароль','class' => 'form-control', 'autocomplete'=>'current-password')) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Новый пароль</label>
                <div class="col-12 col-md-9">
                    {!! Form::password('new_password', array('placeholder' => 'Новый пароль','class' => 'form-control', 'autocomplete'=>'current-password')) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Подтвердите новый пароль</label>
                <div class="col-12 col-md-9">
                    {!! Form::password('new_confirm_password', array('placeholder' => 'Подтвердите новый пароль','class' => 'form-control', 'autocomplete'=>'current-password')) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary font-weight-bold">Потвердить</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@endsection
