@extends('bash.layouts.app')

@section('title', 'Локализация')

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
        	Локализация
        @endslot
        @slot('br_link_item') @endslot @slot('br_title_item')  @endslot
    @endcomponent
@endsection


@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Список переводов
        </div>
        <div class="card-toolbar">
            <a href="{{route('bash.translations.create')}}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <circle fill="#000000" cx="9" cy="15" r="6" />
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                    </g>
                </svg>
            </span>Новый перевод</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-checkable" id="dataTable">
                <thead>
                    <tr>
                        <th>#Id</th>
                        <th>KEY</th>
                        <th>KY</th>
                        <th>RU</th>
						<th>EN</th>
                        <th>Действия</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {

      $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bash.translations.index') }}",
            columns: [
              { data: 'id'},
              { data: 'key'},
              { data: 'ky'},
              { data: 'ru'},
			  { data: 'en'},
              { data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            order: [[ 0, "desc" ]],
            pageLength: 25,
            language: {
                "url": "{{asset('js/russian.json')}}"
            }
      });
    });
</script>

@endsection

