<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        $subjects = Subject::all();
        return view('admin.add_subcategory',compact('subjects','subcategories'));
    }
    public function edit($id)
    {
        $subcategory = SubCategory::where('id',$id)->firstOrFail();
        $subcategories = SubCategory::all();
        $subjects = Subject::all();
        $categories = Category::where('subject_id',$subcategory->category->subject->id)->get();
        return view('admin.edit_subcategory',compact('subjects','subcategories','subcategory','categories'));
    }
    public function store(Request $request)
    {
        SubCategory::create($request->validate([
            'name'=>'required|min:5|max:100',
            'category_id'=>'required|exists:categories,id'
        ]));
        return redirect(route('admin.subcategory.index'));
    }

    public function update($id,Request $request)
    {
        $subcategory = SubCategory::where('id',$id);
        $subcategory->update($request->validate([
            'name'=>'required|min:5|max:100',
            'category_id'=>'required|exists:categories,id'
        ]));
        return redirect(route('admin.subcategory.index'));
    }
    public function destroy($id)
    {
        SubCategory::where('id',$id)->delete();
        return redirect(route('admin.subcategory.index'));
    }
}
