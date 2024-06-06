<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\Courses;
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

        $courses = Courses::all();

        return view('admin.contents.student.create', [
            'courses' => $courses
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'courses_id' => 'nullable|numeric'
        ]);
        
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->courses_id
        ]);

        return redirect('admin/student')->with('pesan', 'berhasil menambahkan data.');
    }

    public function edit($id){
        $student = Student::find($id);
        $courses = Courses::all();


        return view('admin.contents.student.edit', [
            'student' => $student, 'courses' => $courses
        ]);
    }

    public function update($id, Request $request){
        $student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'courses_id' => 'nullable|numeric'


        ]);

        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->courses_id

        ]);

        return redirect('/admin/student')->with('pesan', 'berhasil mengedit data.');
    }

    public function destroy($id){
        $student = Student::find($id);

        $student->delete();

        return redirect('/admin/student')->with('pesan', 'berhasil menghapus data.');
    }
}
