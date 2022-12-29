@extends('bash.layouts.app')

@section('title', 'События')

@section('styles')
@endsection

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
            {{-- Панель управления --}}
        @endslot
        @slot('br_link_item')
        @endslot
        @slot('br_title_item')
        @endslot
        @slot('br_item_next')
        @endslot
    @endcomponent
@endsection

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
					<a href="{{route('bash.events.show', $event)}}">{{$event->getAvialTitle()}}</a>
				</h3>
				<div class="d-flex flex-column">
					<span class="text-muted font-size-sm">число приглашённых гостей: {{$event->inviteesQr->count()}}</span>
					<span class="text-muted font-size-sm">дата начало: {{$event->start_date}} {{$event->start_time}}</span>
				</div>
            </div>
            <div class="card-toolbar text-muted">
				<p class="text-muted mt-3">Список всех приглашённых гостей</p><br>	
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-checkable" id="dataTable">
                    <thead>
                        <tr role="row">
                            <th>#ID</th>
                            <th>ФИО</th>
                            <th>Email</th>
                            <th>Организация</th>
                            <th>Работа</th>
							<th>Действии</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script type="text/javascript">
	$(function() {
		$('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('bash.events.invitees_qr.index', $event) }}",
			columns: [
				{data: 'id'},
				{data: 'full_name'},
				{data: 'email'},
				{data: 'organization'},
				{data: 'job'},
				{
					data: 'action',
					name: 'action',
					orderable: false,
					searchable: false
				},
			],
			order: [
				[0, "asc"]
			],
			pageLength: 25,
			language: {
				"url": "{{ asset('js/russian.json') }}"
			}
		});
	});
</script>
@endsection
