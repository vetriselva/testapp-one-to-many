@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="card m-4" style="width: 30rem;">
            <div class="card-body">
            <h5 class="card-title text-center"><a class="" href="{{route('admin.brand.index')}}">Total Brands </a></h5>
            <h4 class="text-center">{{$brand_count}}</h4>
            </div>
        </div>

        <div class="card m-4" style="width: 30rem;">
            <div class="card-body">
            <h5 class="card-title text-center"> <a class="" href="{{route('admin.category.index')}}"> Total Categories </a></h5>
            <h4 class="text-center"> {{$category_count}} </h4>
            </div>
        </div>
    </div>
 
@stop