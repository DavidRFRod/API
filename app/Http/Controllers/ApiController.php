<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Resources\Student as StudentResource;

class ApiController extends Controller
{
    public function create(Request $request){
        $students = new Student();
        $students->fname = $request->input('fname');
        $students->lname = $request->input('lname');
        $students->email = $request->input('email');
        $students->password = $request->input('password');

        $students->save();
        return response()->json($students);

    }

    public function showbyid($id){

        $students = Student::find($id);
        return response()->json($students);
    }

    public function showall(){

        $students = Student::all();
        return StudentResource::collection($students);
    }
}
