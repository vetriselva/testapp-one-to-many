<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Brand;
use Flash;
use Redirect;
class BrandController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = Brand::create($request->all());
        Flash::success("Brand added successfully");
        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if($brand) 
            return view('brands.edit', compact('brand'));
        Flash::error("Brand not found");
        return redirect(route('admin.brand.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $brand = Brand::find($id)
                        ->update($request->all());
        if($brand)
            Flash::success("Brand updated successfully");
        else
            Flash::error("Something went wrong try again");
        return redirect(route('admin.brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            Flash::success('Brand deleted successfully.');
        } else {
            Flash::error('Something went wrong try again');
        }
        return Redirect::back();  
    }

    public function getBrandApi (Request $request) {
        $modal = Brand::query();
        return Datatables::eloquent($modal)
                ->editColumn('created_at', function( Brand $brand ) {
                    return date("Y-m-d", strtotime($brand->created_at));
                })
                ->addColumn('action', function( Brand $brand ) {
                     $link = "<div class='edit-delete'>";
                     $link .= " <a href=".route('admin.brand.edit', $brand->id)." class='btn btn-info btn-sm '>edit</a>";
                     $link .=" <a href='#' class='btn btn-danger btn-sm delete-modal-popup' data-action=".route('admin.brand.destroy', $brand->id) .">delete</a>";
                     $link .= "</div> ";
                     return $link;
                })
        ->toJson();
    }
}
