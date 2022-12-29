{{-- <div class="form-group row">
	<label class="col-md-3">Выбрать почту для отправки<span class="text-danger">*</span></label>
	<div class="col-md-9">
		<select id="kt_select2_5" class="selectpicker w-50" name="email">
			@foreach ($emails as $item)
				<option value="{{$item->email}}">{{$item->email}}</option>
			@endforeach
		</select>	
	</div>
</div> --}}


<div class="form-group row">
	<label class="col-md-3">Название<span class="text-danger">*</span></label>
	<div class="col-md-9">
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
				<a class="nav-link" data-toggle="tab" href="#title_tab_ky" tabindex="-1" aria-disabled="true">
					<span class="nav-text">Кыргызча</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5" id="myTabContent">
			<div class="tab-pane fade active show" id="title_tab_en" role="tabpanel" aria-labelledby="title_tab_1">
				{!! Form::text('title_en', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('title_en', 'is-invalid')]) !!}
				@error ('number')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="title_tab_ru" role="tabpanel" aria-labelledby="title_tab_2">
				{!! Form::text('title_ru', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('title_ru', 'is-invalid')]) !!}
				@error ('number')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="tab-pane fade" id="title_tab_ky" role="tabpanel" aria-labelledby="title_tab_3">
				{!! Form::text('title_ky', null, ['autocomplete' => 'off', 'class' => 'form-control '.
				$errors->first('title_ky', 'is-invalid')]) !!}
				@error ('number')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
		</div>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Описание<span class="text-danger">*</span></label>
	<div class="col-md-9">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#description_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#description_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#description_tab_ky" tabindex="-1" aria-disabled="true">
					<span class="nav-text">Кыргызча</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5" id="myTabContent2">
			<div class="tab-pane fade active show" id="description_tab_en" role="tabpanel"
				aria-labelledby="description_tab_en">
				{!! Form::textarea('description_en', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
			<div class="tab-pane fade" id="description_tab_ru" role="tabpanel" aria-labelledby="description_tab_ru">
				{!! Form::textarea('description_ru', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
			<div class="tab-pane fade" id="description_tab_ky" role="tabpanel" aria-labelledby="description_tab_ky">
				{!! Form::textarea('description_ky', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
		</div>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-3">Дата начала события</label>
	<div class="col-md-6">
		<div class="input-group date datetimepicker_date" id="kt_datetimepicker_1" data-target-input="nearest" data-provide="datepicker_1">
			{!! Form::text('start_date', null, ['autocomplete' => 'off', 'class' => 'form-control datetimepicker-input '.
				$errors->first('start_date', 'is-invalid'), "placeholder" => "Дата начала", "data-target" => "#kt_datetimepicker_1"])
			!!}
			<div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
				<span class="input-group-text">
					<i class="ki ki-calendar"></i>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Время начала события</label>
	<div class="col-md-6">
		<div class="input-group date datetimepicker_time" id="kt_datetimepicker_2" data-target-input="nearest" data-provide="datepicker_2">
			{!! Form::text('start_time', null, ['autocomplete' => 'off', 'class' => 'form-control datetimepicker-input '.
				$errors->first('start_time', 'is-invalid'), "placeholder" => "24-часовой формат", "data-target" => "#kt_datetimepicker_2"]) 
			!!} 
			<div class="input-group-append" data-target="#kt_datetimepicker_2" data-toggle="datetimepicker">
				<span class="input-group-text">
					<i class="ki ki-clock"></i>
				</span>
			</div>
		</div>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-3">Загрузка файла формата .xlsx<span class="text-danger">*</span></label>
	<div class="col-md-6">
		<div class="input-group">
			{!! Form::file('file_invitees', ['class' => "custom-file-input", 'id' => "file_invitees"]) !!}
			<label class="custom-file-label" for="file_invitees">
				{{$event->file_invitees ?? "Прикрепить файл"}}
			</label>
		</div>
	</div>
</div>


<hr class="my-7">


<div class="form-group row">
	<label class="col-md-3">Текст ответа при <span class="text-success">принятие</span> приглашения</label>
	<div class="col-md-9">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#accept_answer_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#accept_answer_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#accept_answer_tab_ky" tabindex="-1" aria-disabled="true">
					<span class="nav-text">Кыргызча</span>
				</a>
			</li>
		</ul>

	
		{{-- Содержимые табов --}}
		<div class="tab-content mt-5" id="myTabContent3">
			<div class="tab-pane fade active show" id="accept_answer_tab_en" role="tabpanel">
				{!! Form::textarea('accept_answer_en', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
			<div class="tab-pane fade" id="accept_answer_tab_ru" role="tabpanel">
				{!! Form::textarea('accept_answer_ru', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
			<div class="tab-pane fade" id="accept_answer_tab_ky" role="tabpanel">
				{!! Form::textarea('accept_answer_ky', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
		</div>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Текст ответа при <span class="text-danger">отказе</span> от приглашения</label>
	<div class="col-md-9">
		{{-- Заголовки табов --}}
		<ul class="nav nav-tabs nav-tabs-line nav-boldest mb-5">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#reject_answer_tab_en">
					<span class="nav-text">English</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#reject_answer_tab_ru">
					<span class="nav-text">Русский</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#reject_answer_tab_ky" tabindex="-1" aria-disabled="true">
					<span class="nav-text">Кыргызча</span>
				</a>
			</li>
		</ul>

		{{-- Содержимые табов --}}
		<div class="tab-content mt-5" id="myTabContent4">
			<div class="tab-pane fade active show" id="reject_answer_tab_en" role="tabpanel">
				{!! Form::textarea('reject_answer_en', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
			<div class="tab-pane fade" id="reject_answer_tab_ru" role="tabpanel">
				{!! Form::textarea('reject_answer_ru', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
			<div class="tab-pane fade" id="reject_answer_tab_ky" role="tabpanel">
				{!! Form::textarea('reject_answer_ky', null, array('class' => 'froala form-control', 'rows' => '7')) !!}
			</div>
		</div>
	</div>
</div>



<div class="form-group row mb-4">
	<label class="col-3 col-form-label font-weight-bold pt-0 text-right"></label>
	<div class="col-9">
		<div class="card-toolbar border-top pt-10 mt-10">
			<button type="submit" class="btn btn-primary mr-2">Сохранить</button>
			<a href="{{route('bash.events.index')}}" class="btn btn-secondary">Отменить</a>
		</div>
	</div>
</div>