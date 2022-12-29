@extends('bash.layouts.app')

@section('title', 'В доступе отказано')

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        403
        @endslot
        @slot('br_link_item') {{route('bash.index')}} @endslot @slot('br_title_item') Главная @endslot
    @endcomponent
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">403
        </div>
    </div>
    <div class="card-body">
        <p>В доступе отказано </p>
    </div>
</div>
@endsection

@section('scripts')
@endsection