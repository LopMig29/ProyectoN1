<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class StudentsController extends Controller
{
    public function index(Request $request){
        return view("students-vue/index");
    }

    public function list(){
        $students = Student::select('id','name','lastName')->get();
        return response()->json([
            'students' => $students
        ]);
    }

    public function create(){
        return view('students/create');
    }
    
    public function update(Request $request, $id) {
        $student           = Student::findOrFail($id);
        $student->name     = $request->name;
        $student->lastName = $request->lastName;
        $student->update();
        return redirect('students-vue');
    }
    
    public function edit($id){
        return view('students/edit',[
            "student" =>  Student::findOrFail($id)
        ]);
    }

    public function destroy($id){
        return response()->json([
            'success' => Student::destroy($id)
        ]);
    }
}