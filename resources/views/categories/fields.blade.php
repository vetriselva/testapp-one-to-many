
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('brands', 'Brand')!!}: 
            {!! Form::select('brand_id', $brands, null,  ['placeholder' => 'select brand', 'required' => 'required', 'class' => 'form-control'] ) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('name', 'Category Name')!!}: 
            {!! Form::text('category_name', null,  ['placeholder' => 'enter category name', 'required' => 'required', 'class' => 'form-control'] ) !!}
        </div>
    </div>
</div>
<br>
      