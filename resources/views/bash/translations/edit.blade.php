@extends('bash.layouts.app')

@section('title', $translation->name)

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        Редактировать перевод
        @endslot
        @slot('br_link_item') {{route('bash.translations.index')}} @endslot @slot('br_title_item') Переводы @endslot
    @endcomponent
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{$translation->ru}}
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
        {!! Form::model($translation, ['route' => ['bash.translations.update', $translation], 'method' => 'PUT']) !!}
        	@include('bash.translations.form', $translation)
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')
@endsection