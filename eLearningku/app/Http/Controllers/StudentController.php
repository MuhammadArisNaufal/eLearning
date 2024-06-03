<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }

    public function create(){
        return view('admin.contents.student.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);
        
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class
        ]);

        return redirect('admin/student')->with('pesan', 'berhasil menambahkan data.');
    }

    public function edit($id){
        $student = Student::find($id);

        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }

    public function update($id, Request $request){
        $student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class
        ]);

        return redirect('/admin/student')->with('pesan', 'berhasil mengedit data.');
    }

    public function destroy($id){
        $student = Student::find($id);

        $student->delete();

        return redirect('/admin/student')->with('pesan', 'berhasil menghapus data.');
    }
}
