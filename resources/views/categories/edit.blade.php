@extends('layouts.default')
@section('content')
    <div class="panel-body">
        {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'patch']) !!}
            @include('categories.fields')
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit('save', ['class' => 'btn btn-primary two-btns','id' => 'save-category']) !!}
                <a href="{!! route('admin.category.index') !!}" class="btn btn-danger">cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
@stop
