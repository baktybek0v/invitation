@extends('bash.layouts.app')

@section('title', $user->name)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        {{$user->name}}
        @endslot
        @slot('br_link_item') {{route('bash.users.index')}} @endslot @slot('br_title_item') Пользователи @endslot
    @endcomponent
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{$user->name}}
        </div>
    </div>
    <div class="card-body py-4">
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Роль:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$user->getRoleName()}}</span>
            </div>
        </div>

        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Отдел:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$user->getDepartment()}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">ФИО:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$user->name}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Логин:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$user->login}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Контактный телефон:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$user->phone}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Эл.адрес:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$user->email}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Цвет фона событий:</label>
            <div class="col-8 d-flex align-items-center">
                <div class="mr-4 h-25px w-100px border border-3" style="background-color: {{$user->event_bg_color}}"></div>
                <div class="font-weight-bolder">{{$user->event_bg_color}}</div>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Цвет текста событий:</label>
            <div class="col-8 d-flex align-items-center">
                <div class="mr-4 h-25px w-100px border border-3" style="background-color: {{$user->event_text_color}}"></div>
                <div class="font-weight-bolder">{{$user->event_text_color}}</div>
            </div>
        </div>
      {{--  <div class="form-group row my-2">
            <label class="col-4 col-form-label">Роль пользователя:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </span>
            </div>
            <div class="border-top"></div>
        </div>--}}
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Статус:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{!! $user->getStatus() !!}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Дата добавления:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    {{$user->created_at}}
                </span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <a href="{{route('bash.users.index')}}" class="btn btn-secondary mr-2">Назад</a>
                <a href="{{route('bash.users.edit', $user)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div class="col-md-auto">
                {!! Form::open(['method' => 'DELETE','route' => ['bash.users.destroy', $user],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                <input type="hidden" value="Delete">
                <button class="btn btn-light-danger" type="submit">Удалить</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
