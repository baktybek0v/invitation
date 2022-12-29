@extends('bash.layouts.app')

@section('title', $row->name)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        {{$row->name}}
        @endslot
        @slot('br_link_item') {{route('bash.permissions.index')}} @endslot @slot('br_title_item') Права @endslot
    @endcomponent
@endsection

@section('content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                {{$row->name}}
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('bash') }}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ route('permissions.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Права
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ route('permissions.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            {{$row->name}}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{$row->name}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="timeline">
                <div class="entry">
                    <div class="title">
                        <h3>Название</h3>
                    </div>
                    <div class="body">
                        <p>{{ $row->name }}</p>
                    </div>
                </div>
                <div class="entry">
                    <div class="title">
                        <h3>Права</h3>
                    </div>
                    <div class="body">
                        @if(!empty($rolePermissions))
                        <div class="row">
                            @foreach($rolePermissions as $value)
                                <div class="checkbox col-md-3 col-sm-4 col-6">
                                    <label>
                                        {{ Form::checkbox('permission[]', $value->id, array('class' => 'name'), array('disabled')) }}
                                        <i></i>{{ $value->name }}
                                    </label>
                                </div>
                                {{-- <label class="label label-success">{{ $v->name }},</label> --}}
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <fieldset>
                    <div class="buttons-w">
                        <a class="btn btn-success" href="{{route('bash.permissions.index')}}">Все</a>
                        <a class="btn btn-primary" href="{{ route('bash.permissions.edit', $row) }}">Изменить</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['bash.permissions.destroy', $row],'style'=>'display:inline', 'onsubmit' => 'return confirmDelete()']) !!}
                        <input type="hidden" value="Delete">
                        <button class="btn btn-danger float-right" type="submit"><i class="icon-feather-trash-2"></i>Удалить</button>
                        {!! Form::close() !!}
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection