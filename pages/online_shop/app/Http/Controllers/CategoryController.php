<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class CategoryController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $categories = Category::all();
        return view('admin.category',compact('categories','subjects'));
    }
    public function edit($id)
    {
        $subjects = Subject::all();
        $category = Category::where('id',$id)->firstOrFail();
        return view('admin.edit_category',compact('category','subjects'));
    }
    public function update($id , Request $request)
    {
        $category = Category::where('id',$id)->firstOrFail();
        $category->update($request->validate([
            'name'=>'required|min:5|max:40',
            'subject_id'=>'required|exists:subjects,id'
        ]));
        return redirect(route('admin.category.index'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|min:5|max:40',
            'subject'=>'required|exists:subjects,id'
        ]);
        Category::create(['name' => $request->name ,
            'subject_id'=>$request->subject ,'page_title'=>'dd','page_text'=>'ddfddf','page_file'=>'dd'
            , 'main_product_id'=>1]);
        return redirect(route('admin.category.index'));
    }

    public function subjects()
    {
        $subjects = DB::table('subjects')->select(['id','name'])->get();
        echo "<option selected disabled>Select</option>";
        foreach ($subjects as $subject)
        {
            echo "<option value=\"";
            echo $subject->id;
            echo "\">".$subject->name;
            echo "</option>";
        }
    }
    public function categories($id)
    {
        $categories = DB::table('categories')->select(['id','name'])->where('subject_id',$id)->get();
        echo "<option selected disabled>Select</option>";
        foreach ($categories as $category)
        {
            echo "<option value=\"";
            echo $category->id;
            echo "\">".$category->name;
            echo "</option>";
        }
    }
    public function subcategories($id)
    {
        $subcategories = DB::table('sub_categories')->select(['id','name'])->where('category_id',$id)->get();
        echo "<option selected disabled>Select</option>";
        foreach ($subcategories as $subcategory)
        {
            echo "<option value=\"";
            echo $subcategory->id;
            echo "\">".$subcategory->name;
            echo "</option>";
        }
    }
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect(route('admin.category.index'));
    }
}
