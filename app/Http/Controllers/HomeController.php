<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

    }
}

// if($request){
//     $query trim ($request->get('search'));

//     $Students::where('Name', 'lastName', '%'.$query.'%')
//     -> orderBy('id' , 'asc')
//     -> get();

//     return view('/student', ['Student' => $Students, 'search' => $query]);
// }