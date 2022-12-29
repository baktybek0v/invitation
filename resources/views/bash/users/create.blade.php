@extends('bash.layouts.app')

@section('title', 'Новый пользователь')

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
            Новый пользователь
        @endslot
        @slot('br_link_item') {{route('bash.users.index')}} @endslot @slot('br_title_item') Пользователи @endslot
    @endcomponent
@endsection

@section('styles')
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css"/>
    <style>
        .dropdown-menu, .dropdown-menu .inner  {
            min-height: auto !important;
        }
    </style>
@endsection

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Новый пользователь</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route('bash.users.create')}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>Новый пользователь</a>
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
            {!! Form::model(
                $row,[
                'route' => 'bash.users.store',
                'enctype' => 'multipart/form-data'
                ])
            !!}
            @include('bash.users.form', $row)
            {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('scripts')
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.js" > </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js" > </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#event-bg-color').colorpicker().on('change', function (e) {
                $(this).css('background-color', `${e.value}`);
            });
            $('#event-text-color').colorpicker().on('change', function (e) {
                $(this).css('background-color', `${e.value}`);
            });
            $('#event-bg-color').val("2574C4").trigger('change');
            $('#event-text-color').val("fff").trigger('change');
        });
    </script>
@endsection
