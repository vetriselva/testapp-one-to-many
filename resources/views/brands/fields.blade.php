<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('brands', 'Brand Name')!!}: 
            {!! Form::text('brand_name',null,  ['placeholder' => 'enter brand name', 'required' => 'required','class' => 'form-control'] ) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('name', 'Slug Name')!!}: 
            {!! Form::text('slug', null,  ['placeholder' => 'enter slug name', 'required' => 'required', 'class' => 'form-control'] ) !!}
        </div>
    </div>
</div>
<br>
      