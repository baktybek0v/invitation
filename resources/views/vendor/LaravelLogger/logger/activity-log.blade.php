@extends(config('LaravelLogger.loggerBladeExtended'))


<style>
    #DataTables_Table_0_info,
    #DataTables_Table_0_paginate {
        display: none !important;
    }
</style>


@if(config('LaravelLogger.bladePlacement') == 'yield')
@section(config('LaravelLogger.bladePlacementCss'))
@elseif (config('LaravelLogger.bladePlacement') == 'stack')
@push(config('LaravelLogger.bladePlacementCss'))
@endif

@include('LaravelLogger::partials.styles')

@if(config('LaravelLogger.bladePlacement') == 'yield')
@endsection
@elseif (config('LaravelLogger.bladePlacement') == 'stack')
@endpush
@endif

@if(config('LaravelLogger.bladePlacement') == 'yield')
@section(config('LaravelLogger.bladePlacementJs'))
@elseif (config('LaravelLogger.bladePlacement') == 'stack')
@push(config('LaravelLogger.bladePlacementJs'))
@endif

@include('LaravelLogger::partials.scripts', ['activities' => $activities])
@include('LaravelLogger::scripts.confirm-modal', ['formTrigger' => '#confirmDelete'])

@if(config('LaravelLogger.enableDrillDown'))
@include('LaravelLogger::scripts.clickable-row')
@include('LaravelLogger::scripts.tooltip')
@endif

@if(config('LaravelLogger.bladePlacement') == 'yield')
@endsection
@elseif (config('LaravelLogger.bladePlacement') == 'stack')
@endpush
@endif

@section('template_title')
    {{ trans('LaravelLogger::laravel-logger.dashboard.title') }}
@endsection

@php
    switch (config('LaravelLogger.bootstapVersion')) {
        case '4':
        $containerClass = 'card';
        $containerHeaderClass = 'card-header';
        $containerBodyClass = 'card-body';
        break;
        case '3':
        default:
        $containerClass = 'panel panel-default';
        $containerHeaderClass = 'panel-heading';
        $containerBodyClass = 'panel-body';
    }
    $bootstrapCardClasses = (is_null(config('LaravelLogger.bootstrapCardClasses')) ? '' : config('LaravelLogger.bootstrapCardClasses'));
@endphp

@section('content')

    @if(config('LaravelLogger.enableSearch'))
    @include('LaravelLogger::partials.form-search')
    @endif
    @if(config('LaravelLogger.enablePackageFlashMessageBlade'))
    @include('LaravelLogger::partials.form-status')
    @endif
    <div class="{{ $containerClass }} {{ $bootstrapCardClasses }}">
        <div class="{{ $containerHeaderClass }}">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                @if(config('LaravelLogger.enableSubMenu'))

                <span>
                    {!! trans('LaravelLogger::laravel-logger.dashboard.title') !!}
                    {{-- <small> --}}
                        <sup class="label label-xl label-pill label-inline label-default">
                            {{ $totalActivities }} {!! trans('LaravelLogger::laravel-logger.dashboard.subtitle') !!}
                        </sup>
                    {{-- </small> --}}
                </span>

                <div class="btn-group pull-right btn-group-xs">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!! trans('LaravelLogger::laravel-logger.dashboard.menu.alt') !!}
                        </span>
                    </button>
                    @if(config('LaravelLogger.bootstapVersion') == '4')
                    <div class="dropdown-menu dropdown-menu-right">
                        @include('LaravelLogger::forms.clear-activity-log')
                        <a href="{{route('cleared')}}" class="dropdown-item">
                            <i class="fa fa-fw fa-history" aria-hidden="true"></i>
                            {!! trans('LaravelLogger::laravel-logger.dashboard.menu.show') !!}
                        </a>
                    </div>
                    @else
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item">
                            @include('LaravelLogger::forms.clear-activity-log')
                        </li>
                        <li class="dropdown-item">
                            <a href="{{route('cleared')}}">
                                <i class="fa fa-fw fa-history" aria-hidden="true"></i>
                                {!! trans('LaravelLogger::laravel-logger.dashboard.menu.show') !!}
                            </a>
                        </li>
                    </ul>
                    @endif
                </div>

                @else
                {!! trans('LaravelLogger::laravel-logger.dashboard.title') !!}
                <span class="pull-right label label-xl label-pill label-inline label-default">
                    {{ $totalActivities }}
                    <span class="hidden-sms">
                        {!! trans('LaravelLogger::laravel-logger.dashboard.subtitle') !!}
                    </span>
                </span>
                @endif

            </div>
        </div>
        <div class="{{ $containerBodyClass }}">
            @include('LaravelLogger::logger.partials.activity-table', ['activities' => $activities, 'hoverable' => true])
        </div>
    </div>

@include('LaravelLogger::modals.confirm-modal', ['formTrigger' => 'confirmDelete', 'modalClass' => 'danger', 'actionBtnIcon' => 'fa-trash-o'])

@endsection