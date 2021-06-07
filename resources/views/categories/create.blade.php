@extends('layouts.default')
@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'admin.category.store','id' => 'category-form']) !!}
            @include('categories.fields')
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit('save', ['class' => 'btn btn-primary two-btns','id' => 'save-category']) !!}
                <a href="{!! route('admin.category.index') !!}" class="btn btn-danger">cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
@stop
