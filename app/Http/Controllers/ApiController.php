<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class ApiController extends Controller
{
    public function create(Request $request){
        $data = $request->all();
        $students = new Student();
        $students->fname = $request->input('fname');
        $students->lname = $request->input('lname');
        $students->email = $request->input('email');
        $students->password = $request->input('password');

        $students->save($data);
        return response('OK', 200)
        ->header('Content-Type', 'text/plain');

    }

    public function showbyid($id){

        $students = Student::find($id);
        return response('OK', 200)
        ->header('Content-Type', 'text/json');
    }

    public function showall(){

        $students = Student::all();
        return response('OK', 200)
            ->header('Content-Type', 'text/json');
    }
    public function delete(Request $request, Student $students){

        $students->delete();
        return response('OK', 200)
            ->header('Content-Type', 'text/json');
    }
}
