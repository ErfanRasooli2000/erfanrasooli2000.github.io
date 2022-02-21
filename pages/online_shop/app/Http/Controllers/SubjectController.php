<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject',compact('subjects'));
    }

    public function edit($id)
    {
        $subject = Subject::where('id',$id)->firstOrFail();
        return view('admin.edit_subject',compact('subject'));
    }

    public function update($id , Request $request)
    {
        $subject = Subject::where('id',$id)->firstOrFail();
        $subject->update($request->validate([
            'name'=>'required|min:5|max:40'
        ]));
        return redirect(route('admin.subject.index'));
    }

    public function store(Request $request)
    {
        Subject::create($request->validate([
            'name'=>'required|min:5|max:40'
        ]));
        return redirect(route('admin.subject.index'));
    }
    public function destroy($id)
    {
        Subject::where('id',$id)->delete();
        return redirect(route('admin.subject.index'));
    }
}
