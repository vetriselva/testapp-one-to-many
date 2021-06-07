<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Brand;
use App\Category;
use Flash;
use Redirect;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('brand')->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all()->pluck('brand_name','id');
        return view('categories.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->all());
        Flash::success("Category added successfully");
        return redirect(route('admin.category.index'));
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
        $category = Category::find($id);
        $brands = Brand::get()->pluck('brand_name','id'); 
        if(!$category) {
            Flash::error("Category not found");
            return redirect(route('admin.category.index'));
        }
        return view('categories.edit', compact('category','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    { 
        $category = Category::find($id)
                            ->update($request->all());
        if($category)
            Flash::success("Category updated successfully");
        else
            Flash::error("Something went wrong try again");
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            Flash::success('Category deleted successfully.');
        } else {
            Flash::error('Something went wrong try again');
        }
        return Redirect::back();  
    }

    public function getCategoryApi (Request $request) {
        $modal = Category::with('brand');
        return Datatables::eloquent($modal)
                ->editColumn('created_at', function( Category $category ) {
                    return date("Y-m-d", strtotime($category->created_at));
                })
                ->addColumn('action', function( Category $category ) {
                     $link = "<div class='edit-delete'>";
                     $link .= " <a href=".route('admin.category.edit', $category->id)." class='btn btn-info btn-sm '>edit</a>";
                     $link .=" <a href='#' class='btn btn-danger btn-sm delete-modal-popup' data-action=".route('admin.category.destroy', $category->id) .">delete</a>";
                     $link .= "</div> ";
                     return $link;
                })
        ->toJson();
    }
}
