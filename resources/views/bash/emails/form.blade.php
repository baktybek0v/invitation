<div class="form-group row">
    <label class="col-md-3">Mailer<span class="text-danger">*</span></label>
    <div class="col-md-9">
        {!! Form::text('mailer', "smtp", ['placeholder' => 'smtp', 'autocomplete' => 'nope', 'class' => 'form-control '. $errors->first('mailer', 'is-invalid')]) !!}
        @error ('mailer')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-3">Host<span class="text-danger">*</span></label>
    <div class="col-md-9">
        {!! Form::text('host', null, ['placeholder' => 'smtp.office365.com', 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('host', 'is-invalid')]) !!}
        @error ('host')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3">Порт<span class="text-danger">*</span></label>
    <div class="col-md-9">
        {!! Form::text('port', null, ['placeholder' => '587', 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('port', 'is-invalid')]) !!}
        @error ('port')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row fv-plugins-icon-container">
	<label class="col-xl-3 col-lg-3 col-form-label">Email<span class="text-danger">*</span></label>
	<div class="col-lg-9 col-xl-9">
		<div class="input-group input-group-lg input-group-solid">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="la la-at"></i>
				</span>
			</div>
			{!! Form::text('email', null, ['placeholder' => 'undp.kg@outlook.com', 'autocomplete' => 'off', 'class' => 'form-control form-control-lg form-control-solid '. $errors->first('email', 'is-invalid')]) !!}
		</div>
	<div class="fv-plugins-message-container"></div></div>
</div>


@if(str_ends_with(Route::currentRouteName(), 'create'))
	<div class="form-group row">
		<label class="col-md-3">Пароль<span class="text-danger">*</span></label>
		<div class="col-md-9">
			{!! Form::password('password', ['autocomplete' => 'off', 'class' => 'form-control form-control-lg form-control-solid' . $errors->first('email', 'is-invalid')]) !!}
			@error ('password')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-md-3">Потверждение пароля<span class="text-danger">*</span></label>
		<div class="col-md-9">
			{!! Form::password('password_confirmation', ['autocomplete' => 'off', 'class' => 'form-control form-control-lg form-control-solid' . $errors->first('password_confirmation', 'is-invalid')]) !!}
			{{-- <input name="password_confirmation" class="form-control form-control-lg form-control-solid" type="password" value=""> --}}
			@error ('password_confirmation')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
	</div>
@endif


<div class="form-group row">
    <label class="col-md-3">Шифрование<span class="text-danger">*</span></label>
    <div class="col-md-9">
        {!! Form::text('encryption', null, ['placeholder' => 'tls', 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('encryption', 'is-invalid')]) !!}
        @error ('encryption')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-3">От адреса (почта)</label>
    <div class="col-md-9">
        {!! Form::text('from_address', null, ['placeholder' => 'undp.kg@outlook.com', 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('from_address', 'is-invalid')]) !!}
        @error ('from_address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-3">От имени</label>
    <div class="col-md-9">
        {!! Form::text('from_name', null, ['placeholder' => 'undp.org', 'autocomplete' => 'off', 'class' => 'form-control '. $errors->first('from_name', 'is-invalid')]) !!}
        @error ('from_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-3 col-form-label font-weight-bold pt-0 text-right"></label>
    <div class="col-9">
        <div class="card-toolbar border-top pt-10 mt-10">
            <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
            <a href="{{route('bash.emails.index')}}" class="btn btn-secondary">Отменить</a>
        </div>
    </div>
</div>
