@extends('layouts.default')
@section('content')
    <div class="panel-body">
        {!! Form::model($brand, ['route' => ['admin.brand.update', $brand->id], 'method' => 'patch']) !!}
            @include('brands.fields')
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit('save', ['class' => 'btn btn-primary two-btns','id' => 'save-brand']) !!}
                <a href="{!! route('admin.brand.index') !!}" class="btn btn-danger">cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
@stop
