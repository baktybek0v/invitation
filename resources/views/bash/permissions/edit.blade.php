@extends('bash.layouts.app')

@section('title', $permission->name)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        {{$permission->name}}
        @endslot
        @slot('br_link_item') {{route('bash.permissions.index')}} @endslot @slot('br_title_item') Права @endslot
    @endcomponent
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Изменить права - {{$permission->name}}
        </div>
    </div>
    <div class="card-body">
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
        {{ Form::model($permission, array('route' => array('bash.permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
        <div class="form-group row">
            <label class="col-2 col-form-label">
                Название
            </label>
            <div class="col-6">
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary mr-2">
                    Сохранить
                </button>
                <a href="{{route('bash.permissions.index')}}" class="btn btn-secondary">
                    Отменить
                </a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection