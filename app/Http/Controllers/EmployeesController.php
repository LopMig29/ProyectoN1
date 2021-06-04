<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class EmployeesController extends Controller
{
    public function index(Request $request){
        return view("employees-vue/index",[
            "searchBy"  => $request->searchBy
        ]);
    }

    public function create(){
        return view('employees-vue/create');
    }

    public function store(Request $request){
        $employee               = new Employee();
        $employee->name         = $request->name;
        $employee->lastName     = $request->lastName;
        $employee->salary       = $request->salary;
        $employee->civilStatus  = $request->civilStatus;
        $employee->save();
        return redirect('employees-vue');
    }
    
    public function update(Request $request, $id) {
        $employee                = Employee::findOrFail($id);
        $employee->name          = $request->name;
        $employee->lastName      = $request->lastName;
        $employee->salary        = $request->salary;
        $employee->civilStatus   = $request->civilStatus;
        $employee->update();
        return redirect('employees-vue');
    }
    
    public function edit($id){
        return view('employees-vue/edit',[
            "employee" =>  Employee::findOrFail($id)
        ]);
    }

    public function destroy($id){
        return response()->json([
            'success' =>Employee::destroy($id)
            ]);
        }
        
    public function list(){
        $employees = Employee::select('id','name','lastName','salary', 'civilStatus')->Paginate(10);
        return response()->json([
            'employees' => $employees
        ]);
    }
}