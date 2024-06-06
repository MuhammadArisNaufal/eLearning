<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        $courses = Courses::all();

        return view('admin.contents.courses.index', [
            'courses' => $courses
        ]);
    }

    public function create(){
        return view('admin.contents.courses.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);
        
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        return redirect('admin/courses')->with('pesan', 'berhasil menambahkan data.');
    }

    public function edit($id){
        $courses = Courses::find($id);

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    public function update($id, Request $request){
        $courses = Courses::find($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        return redirect('/admin/courses')->with('pesan', 'berhasil mengedit data.');
    }

    public function destroy($id){
        $courses = Courses::find($id);

        $courses->delete();

        return redirect('/admin/courses')->with('pesan', 'berhasil menghapus data.');
    }
}
