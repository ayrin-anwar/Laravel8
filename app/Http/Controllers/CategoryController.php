<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    function categories()
    {    //$cats=Category::all();
        //$cats=Category::latest()->get();
        //$cats=Category::OrderBy('category_name','asc')->get();
       // $cats=Category::OrderBy('category_name','asc')->simplePaginate(3);
        return view('backend.Category.category_view',[
            'cats'=>Category::OrderBy('category_name','asc')->simplePaginate(3)
            ]);
         //return view('backend.Category.category_view',compact('cats'));
    }
    function addcategory()
    {
        return view('backend.Category.category_form');
    }
    function postcategory(Request $request)
    {  //return $request->all();
        //return "OK";
        $cat=new Category;
        $cat->category_name=$request->category_name;
        $cat->slug=str::slug($request->category_name);
        $cat->save();
        return redirect('/categories');
    }
    function deletecategory($data)
    {
        $cat=Category::findorFail($data)->delete();
        return back()->with('success','Category deleted successfully');
    }
    function editcategory($data)
    {
        return view('backend.Category.category_edit',['cat'=>Category::findorFail($data)],);
        // $cat=Category::findorFail($request->cat_id);
        // $cat->category_name=$request->category_name;
        // $cat->slug=str::slug($request->category_name);
        // $cat->save();
        // return back()->with('success','Category updated successfully');
    }
    function updatecategory(Request $request)
    { $cat=Category::findorFail($request->cat_id);
        $cat->category_name=$request->category_name;
        $cat->slug=str::slug($request->category_name);
        $cat->save();
        return back()->with('success','Category updated successfully');
        return redirect('/categories');
    }
}
