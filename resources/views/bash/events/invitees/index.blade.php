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
            <div class="card-title max-w-50">
                <h3 class="card-label">
					<a href="{{route('bash.events.show', $event)}}">{{$event->getAvialTitle()}}</a>
				</h3>
            </div>
            <div class="card-toolbar">
				<a href="{{route('bash.events.invitees.create', ['event' => $event])}}" class="btn btn-primary font-weight-bolder">
				<span class="svg-icon svg-icon-md">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"></rect>
							<circle fill="#000000" cx="9" cy="15" r="6"></circle>
							<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
						</g>
					</svg>
				</span>Создать нового получателя</a>
			</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-checkable" id="dataTable">
                    <thead>
                        <tr role="row">
                            <th>#ID</th>
							<th>№</th>
                            <th>ФИО</th>
                            <th>Email</th>
							<th>Дублирование</th>
							<th>Рассылка</th>
                            <th>Статус</th>
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
                ajax: "{{ route('bash.events.invitees.index', $event) }}",
                columns: [
					{data: 'id'},
					{data: 'number'},
                    {data: 'full_name_ru'},
                    {data: 'email'},
					{data: 'duplicate'},
                    {data: 'sended'},
                    {data: 'status'},
                    {
						data: 'action',
                        name: 'action',
						width: "125px",
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
