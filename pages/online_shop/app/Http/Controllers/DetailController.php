<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $details = Detail::all();
        return view('admin.detail',compact('details'));
    }
    public function store(Request $request)
    {
        Detail::create($request->validate([
            'key'=>'required|min:3|max:200',
            'subcategory_id'=>'required|exists:sub_categories,id'
        ]));
        return redirect(route('admin.detail.index'));
    }
    public function destroy($id)
    {
        Detail::where('id',$id)->delete();
        return redirect(route('admin.detail.index'));
    }
    public function show($id,$number)
    {
        $details = Detail::where('subcategory_id',$id)->get();
        echo '<div class="d-flex mt-2 justify-content-evenly align-items-center">'.'<select name="detail'.$number.'" class="selectInput" required id="detail">';
        foreach($details as $detail)
        {
            echo '<option value="'.$detail->id.'">'.$detail->key.'</option>';
        }
        echo '</select>'.'<input name="detailvalue'.$number.'" type="text" placeholder="Value">'.'</div>';
    }
}
