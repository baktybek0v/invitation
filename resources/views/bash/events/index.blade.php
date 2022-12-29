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
                <h3 class="card-label">События</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('bash.events.create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>Добавить
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
				<table class="table table-bordered table-hover table-checkable" id="dataTable">
					<thead>
						<tr role="row">
							<th>#ID</th>
							<th>Название</th>
							<th>Дата начало</th>
							<th>Всего по Email</th>
							<th>Всего по QR</th>
							<th>Прогресс (отправлено)</th>
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
		$(document).ready(function () {
            $('#dataTable').DataTable({
				padding: false,
				scrollX: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('bash.events.index') }}",
                columns: [
					{data: 'id'},
                    {data: 'title'},
                    {data: 'start_date'},
                    {data: 'invitees'},
					{data: 'invitees_qr'},
					{data: 'sended_percentage'},
                    {
                        data: 'action',
                        name: 'action',
						width: "125px",
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                pageLength: 25,
                language: {
                    "url": "{{ asset('js/russian.json') }}"
                }
            });
        });
    </script>
@endsection
