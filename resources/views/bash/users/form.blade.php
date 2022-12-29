<div class="form-group row">
    <label class="col-md-3">Роль<span class="text-danger">*</span></label>
    <div class="col-md-9">
        {!! Form::select('roles', $roles, null, ['required', 'class' => 'form-control selectpicker', 'placeholder' => '-- Выберите --']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3">Отдел</label>
    <div class="col-md-9">
        {!! Form::select('department_id', $departments, null, ['class' => 'form-control selectpicker', 'placeholder' => '-- Выберите --']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3">ФИО<span class="text-danger">*</span></label>
    <div class="col-9">
        {!! Form::text('name', null, array('class' => 'form-control', 'required')) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3">Логин<span class="text-danger">*</span></label>
    <div class="col-9">
        {!! Form::text('login', null, array('class' => 'form-control', 'required')) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3">Email</label>
    <div class="col-9">
        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">Номер телефона</label>
    <div class="col-9">
        {!! Form::text('phone', null, array('placeholder' => '+(996)-777-777-777', 'class' => 'form-control', 'rows' => '2')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">Пароль<span class="text-danger">*</span></label>
    <div class="col-9">
        {!! Form::password('password', array('placeholder' => 'Пароль','class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">Подтвердить пароль<span class="text-danger">*</span></label>
    <div class="col-9">
        {!! Form::password('password_confirmation', array('placeholder' => 'Подтвердить пароль','class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">Цвет фона событий</label>
    <div class="col-9">
        {!! Form::text('event_bg_color', null, array('id' => "event-bg-color", 'class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">Цвет текста событий</label>
    <div class="col-9">
        {!! Form::text('event_text_color', null, array('id' => "event-text-color", 'class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row mb-5">
    <label class="col-3 col-form-label font-weight-bold pt-0">Статус</label>
    <div class="col-9">
        <div class="checkbox-inline">
            <label class="checkbox checkbox-primary">
            {!! Form::hidden('active', 0) !!}
            {!! Form::checkbox('active', 1) !!}
            <span></span>Активный</label>
        </div>
    </div>
</div>

<div class="card-toolbar border-top pt-10 mt-10">
    <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
    <a href="{{route('bash.users.index')}}" class="btn btn-secondary">Отменить</a>
</div>



