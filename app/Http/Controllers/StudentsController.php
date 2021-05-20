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
    
    public function update(Request $request, $id) {
        $id->update($request->all());

        return response()->json($id);
    }
    
    public function edit($id){
        return response()->json([
            "student" => Student::findOrFail($id)
        ]);
    }

    public function destroy($id){
        return response()->json([
            'success' => Student::destroy($id)
        ]);
    }
}