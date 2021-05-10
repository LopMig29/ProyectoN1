<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyFirstController extends Controller
{
    public function index(Request $request){
        return view("home/index",[
            "tests" => Student::where('name','LIKE', '%'.$request->searchBy.'%')->simplePaginate(10),
            "searchBy" => $request->searchBy
        ]);
    }

    // public function create(){
    //     return view("home",[
    //         "tests" => MyFirstModel::all()
    //     ]);

    // }

    public function store(Request $request){
        $student           = new Student();
        $student->name     = $request->name;
        $student->lastName = $request->lastName;
        $student->save();
        return redirect('students');
    }

    public function create(Request $request){
        return view('home/create');
    }
    
    public function edit($id){
        return view('home/edit',[
            "student" =>  Student::findOrFail($id)
        ]);
    }

    public function destroy($id){
        Student::destroy($id);
        return redirect ('students');
    }

    public function update(Request $request, $id) {
        // Student::where('id','=', $id)->update(); 
        $student           = Student::findOrFail($id);
        $student->name     = $request->name;
        $student->lastName = $request->lastName;
        $student->update();
        
        return redirect('students');
    }
}
