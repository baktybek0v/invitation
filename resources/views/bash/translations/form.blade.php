<div class="form-group row">
    <label class="col-md-3">На кыргызском</label>
    <div class="col-9">
        {!! Form::textarea('ky', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">На русском</label>
    <div class="col-9">
        {!! Form::textarea('ru', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">На английском</label>
    <div class="col-9">
        {!! Form::textarea('en', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3">Slug</label>
    <div class="col-9">
        {!! Form::text('key', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="card-toolbar border-top pt-10 mt-10">
    <button type="submit" class="btn btn-primary">
        Сохранить
    </button>
    <a href="{{route('bash.translations.index')}}" class="btn btn-secondary">
        Отменить
    </a>
</div>