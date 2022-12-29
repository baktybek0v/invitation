@extends('bash.layouts.app')
@section('title', $row->ru)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        {{$row->ru}}
        @endslot
        @slot('br_link_item') {{route('bash.translations.index')}} @endslot @slot('br_title_item') Переводы @endslot
    @endcomponent
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{$row->ru}}
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Slug:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$row->key}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Ky:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{$row->ky}}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Ru:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    <span class="form-control-plaintext font-weight-bolder">{{$row->ru}}</span>
                </span>
            </div>
            <div class="border-top"></div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">Дата добавления:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">
                    {{$row->created_at}}
                </span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <a href="{{route('bash.translations.index')}}" class="btn btn-secondary mr-2">Назад</a>
                <a href="{{route('bash.translations.edit', $row)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div class="col-md-auto">
                {!! Form::open(['method' => 'DELETE','route' => ['bash.translations.destroy', $row],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                <input type="hidden" value="Delete">
                <button class="btn btn-light-danger" type="submit">Удалить</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

