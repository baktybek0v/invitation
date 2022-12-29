@extends('bash.layouts.app')


@section('title', $role->name)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        {{$role->name}}
        @endslot
        @slot('br_link_item') {{route('bash.roles.index')}} @endslot @slot('br_title_item') Роли @endslot
    @endcomponent
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{$role->name}}
        </div>
    </div>
    <div class="card-body py-4">
        <div class="form-group row my-2">
            <label class="col-2 col-form-label">Название:</label>
            <div class="col-9">
                <span class="form-control-plaintext font-weight-bolder">{{$role->name}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-2 col-form-label">Права:</label>
            <div class="col-9">
                <span class="form-control-plaintext font-weight-bolder">
                    @if(!empty($rolePermissions))
                    <div class="row">
                        @foreach($rolePermissions as $value)
                            <div class="col-3">
                                <div class="checkbox-inline">
                                    <label class="checkbox">
                                    {{ Form::checkbox('permission[]', $value->id, array('class' => 'name'), array('disabled')) }}
                                    <span></span>{{ $value->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <a href="{{route('bash.roles.index')}}" class="btn btn-secondary mr-2">Назад</a>
                <a href="{{route('bash.roles.edit', $role)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div class="col-md-auto">
                {!! Form::open(['method' => 'DELETE','route' => ['bash.roles.destroy', $role],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                <input type="hidden" value="Delete">
                <button class="btn btn-light-danger" type="submit">Удалить</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection