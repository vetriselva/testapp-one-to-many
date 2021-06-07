@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="form-group m-3">
            <a href="{{route('admin.category.create')}}" class="btn btn-info"> Create </a>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="categories-table" style="width:100%">

        <thead class="thead-dark">
            <tr>
                <td> S.NO </td>
                <td> Date </td>
                <td> Brand </td>
                <td> Category Name </td>
                <td> Action </td>
            </tr>
        </thead>

        <tbody>
            {{-- @forelse ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> {{$category->created_at}} </td>
                    <td> {{$category->brand->name}} </td>
                    <td> {{$category->name}} </td>
                    <td class="align-center">
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info btn-sm">
                            edit
                        </a>
                        <a href="#"  class="btn btn-danger btn-sm delete-modal-popup" data-action="{{  route('admin.category.destroy', $category->id)  }}">
                            delete
                        </a>
                    </td>
                </tr>
            @empty
                <td colspan="5" class="text-center">No data found</td>
            @endforelse --}}
        </tbody>
    </table>
@stop
@section('footer_scripts')
<script  type="text/javascript" src="{{ asset('assets/pages/category.js') }}" ></script>
@stop
