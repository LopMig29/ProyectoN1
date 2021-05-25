<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class EmployeesController extends Controller
{
    public function index(Request $request){
        return view("employees-vue/index",[
            "employees"     => $this->getEmployees(),
            "searchBy"      => $request->searchBy
        ]);
    }

    public function create(){
        return view('employees/create');
    }

    public function store(Request $request){
        $employee           = new Employee();
        $employee->name     = $request->name;
        $employee->lastName = $request->lastName;
        $employee->lastName = $request->sueldoBruto;
        $employee->lastName = $request->estadoCivil;
        $employee->save();
        return redirect('employees-vue');
    }
    
    public function update(Request $request, $id) {
        $employee                = Employee::findOrFail($id);
        $employee->name          = $request->name;
        $employee->lastName      = $request->lastName;
        $employee->sueldoBruto   = $request->sueldoBruto;
        $employee->estadoCivil   = $request->estadoCivil;
        $employee->update();
        return redirect('employees-vue');
    }
    
    public function edit($id){
        return view('employees/edit',[
            "employee" =>Employee::findOrFail($id)
        ]);
    }

    public function destroy($id){
        return response()->json([
            'success' =>Employee::destroy($id)
            ]);
        }
        
    public function list(){
        $employees = Employee::select('id','name','lastName','sueldoBruto', 'estadoCivil')->get();
        return response()->json([
            'employees' => $employees
            ]);
        }

    private function getEmployees(){ 
        $searchBy = request()->searchBy;
        return Employee::where('name','LIKE', '%'.$searchBy.'%')->Paginate(10);
    }
}