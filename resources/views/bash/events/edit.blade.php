@extends('bash.layouts.app')

@section('title', "Редактирования событии")

@section('subheader')
    @component('bash.layouts.partials._subheader.subheader')
        @slot('br_title')
			Редактировать
        @endslot
        @slot('br_link_item') {{route('bash.events.index')}} @endslot @slot('br_title_item') Все сыбытия @endslot
    @endcomponent
@endsection

@section('content')
	<div class="card card-custom">
		<div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
					Редактирование
					<a href="{{route('bash.events.show', $event)}}" class="text-primary">{{$event->getAvialTitle()}}</a>
				</h3>
            </div>
        </div>

		<div class="card-body">
			<div class="alert alert-custom alert-outline-danger fade show mb-7" role="alert">
				<div class="alert-icon"><i class="flaticon-warning"></i></div>
				<div class="alert-text">
					Поля отмеченные звездочкой
						(<span class="text-danger">*</span>)
					обязательны для заполнения !
				</div>
				<div class="alert-close">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="ki ki-close"></i></span>
					</button>
				</div>
			</div>
					
            <!-- errors -->
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

			{!! Form::model($event, ['route' => ['bash.events.update', $event], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        		@include('bash.events.form', $event)
        	{!! Form::close() !!}
        </div>
	</div>
@endsection


@section('scripts')
	<script>
		Dropzone.autoDiscover = false;

		// WYCWYG editor
		var KTSummernoteDemo = function () {
			// Private functions
			let descriptions = $(".wycwyg-editor ");

			var demos = function () {
				descriptions.summernote({
					height: 400
				});
			}

			return {
				// public functions
				init: function() {
					demos();
				}
			};
		}();

		var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
			url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
			paramName: "file", // The name that will be used to transfer the file
			maxFiles: 1,
			maxFilesize: 10, // MB
			addRemoveLinks: true,
			accept: function(file, done) {
				if (file.name == "wow.jpg") {
					done("Naha, you don't.");
				} else {
					done();
				}
			}
		});
	
		// Initialization
		jQuery(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			KTSummernoteDemo.init();

			$('.datetimepicker_date').datetimepicker({
				locale: 'ru',
				use24hours: true,
				todayHighlight: true,
				format: 'YYYY-MM-DD',
				autoclose: true
			});
			$('.datetimepicker_time').datetimepicker({
				use24hours: true,
				format: 'HH:mm',
				autoclose: true
			});

			
			$('#kt_select2_5').selectpicker();
			
		});
	
	
	</script>
@endsection