@push('styles')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="form-group row">
	<label class="col-md-3">Номер в списке</label>
	<div class="col-md-6">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">№</span>
			</div>
			{!! Form::number('number', null, ['autocomplete' => 'off', 'class' => 'form-control '. $errors->first('number', 'is-invalid')]) !!}
			@error ('number')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		
		</div>
	</div>
</div>

<div class="form-group row mb-8">
	<label class="col-md-3">Email <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">@</span>
			</div>
			{!! Form::text('email', null, ['placeholder' => "Email", 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('email', 'is-invalid')]) !!}
			@error ('email')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		
		</div>
		<span class="email-error text-danger" style="display: none">не валидный email</span>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Дублирование</label>
	<div class="col-md-6">
		<div class="input-group">
			<span class="switch switch-outline switch-icon switch-success">
				<label>
					{!! Form::checkbox('duplicate') !!}
					<span></span>
				</label>
			</span>
		</div>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">ФИО<span class="text-danger">*</span></label>
	<div class="col-md-6">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#full_name_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#full_name_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5">
			<div class="tab-pane fade active show" id="full_name_tab_en" role="tabpanel" aria-labelledby="title_tab_1">
				{!! Form::text('full_name_en', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('full_name_en', 'is-invalid')]) !!}
				@error ('full_name_en')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="full_name_tab_ru" role="tabpanel" aria-labelledby="title_tab_2">
				{!! Form::text('full_name_ru', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('full_name_ru', 'is-invalid')]) !!}
				@error ('full_name_ru')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
		</div>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Обращение<span class="text-danger">*</span></label>
	<div class="col-md-6">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#title_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#title_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#title_tab_ky">
					<span class="nav-text">Кыргызский</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5">
			<div class="tab-pane fade active show" id="title_tab_en" role="tabpanel">
				{!! Form::select('title_en', ["Mr." => "Mr. Dear", "Ms." => "Ms. Dear"], null, ["class" => "select2 form-control"])!!}
				@error ('title_en')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="title_tab_ru" role="tabpanel">
				{!! Form::select('title_ru', ["Г-на" => "Уважаемый господин", "Г-жа" => "Уважаемая госпожа"], null, ["class" => "select2 form-control"])!!}
				@error ('title_ru')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="title_tab_ky" role="tabpanel">
				<input type="text" disabled value="Урматтуу" class="form-control">
			</div>
		</div>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Организация</label>
	<div class="col-md-6">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#organization_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#organization_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5">
			<div class="tab-pane fade active show" id="organization_tab_en" role="tabpanel" aria-labelledby="organization_tab_1">
				{!! Form::text('organization_en', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('organization_en', 'is-invalid')]) !!}
				@error ('organization_en')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="organization_tab_ru" role="tabpanel" aria-labelledby="organization_tab_2">
				{!! Form::text('organization_ru', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('organization_ru', 'is-invalid')]) !!}
				@error ('organization_ru')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
		</div>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Позиция (Job)</label>
	<div class="col-md-6">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#job_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#job_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5">
			<div class="tab-pane fade active show" id="job_tab_en" role="tabpanel" aria-labelledby="job_tab_1">
				{!! Form::text('job_en', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('job_en', 'is-invalid')]) !!}
				@error ('job_en')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="job_tab_ru" role="tabpanel" aria-labelledby="job_tab_2">
				{!! Form::text('job_ru', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('job_ru', 'is-invalid')]) !!}
				@error ('job_ru')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
		</div>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Языки <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<div class="input-group">
			{!! Form::text('languages', null, ['placeholder' => "eng/ru/kg", 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('languages', 'is-invalid')]) !!}
			@error ('languages')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Отправлено</label>
	<div class="col-md-6">
		<div class="input-group">
			<span class="switch switch-outline switch-icon switch-success">
				<label>
					{!! Form::checkbox('sended') !!}
					<span></span>
				</label>
			</span>
		</div>
		<span class="text-danger">внимание: это поле управляется автоматически,</span>
		<span class="text-danger">измените его только в том случае если вы знаете что делаете</span>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Статус</label>
	<div class="col-md-6">
		<div class="input-group">
			{{-- {!! Form::select('status', null, ['placeholder' => "eng/ru/kg", 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('languages', 'is-invalid')]) !!} --}}
			{!! Form::select('title_en', ["pending" => "В ожидании", "accept" => "Принято", "reject" => "Отказано"], null, ["class" => "select2 form-control"])!!}
			@error ('languages')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<span class="text-danger">внимание: это поле управляется автоматически,</span>
		<span class="text-danger">измените его только в том случае если вы знаете что делаете</span>
	</div>
</div>


<div class="form-group row mb-4">
	<label class="col-3 col-form-label font-weight-bold pt-0 text-right"></label>
	<div class="col-9">
		<div class="card-toolbar border-top pt-10 mt-10">
			<button type="submit" class="btn btn-primary mr-2">Сохранить</button>
			<a href="{{route('bash.events.invitees.index', $event)}}" class="btn btn-secondary">Отменить</a>
		</div>
	</div>
</div>


@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			// Email
			function validateEmail(email) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if (!emailReg.test(email)) {
					$('.email-error').show();
				} else {
					$('.email-error').hide();
				}
			}

			$("[name='email']").first().keyup(function () {
				var $email = this.value;
				validateEmail($email);
			});

			// select2
			$('.select2').select2({
				minimumResultsForSearch: -1
			});


			$(".languages").on("select2:select", function (evt) {
				var element = evt.params.data.element;
				var $element = $(element);
				$element.detach();
				$(this).append($element);
				$(this).trigger("change");
			});
		});
		
	</script>
@endpush
