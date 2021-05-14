<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class MyFirstController extends Controller
{
    public function index(Request $request){
        return view("students/index",[
            "students"  => $this->getStudents(),
            "searchBy"  => $request->searchBy
        ]);
    }

    public function store(Request $request){
        $student           = new Student();
        $student->name     = $request->name;
        $student->lastName = $request->lastName;
        $student->save();
        return redirect('students');
    }

    public function create(){
        return view('students/create');
    }
    
    public function edit($id){
        return view('students/edit',[
            "student" =>  Student::findOrFail($id)
        ]);
    }

    public function destroy($id){
        Student::destroy($id);
        return redirect ('students');
    }

    public function update(Request $request, $id) {
        $student           = Student::findOrFail($id);
        $student->name     = $request->name;
        $student->lastName = $request->lastName;
        $student->update();
        return redirect('students');
    }

    private function getStudents(){ 
        $searchBy = request()->searchBy;
        return Student::where('name','LIKE', '%'.$searchBy.'%')->Paginate(10);
    }
}