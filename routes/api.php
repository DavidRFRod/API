<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Student;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => '/v1'], function () {
    Route::get('/students', function(){
        $students = Student::all();
        return $students;
    });
    Route::post('/students', function(Request $request){
        $students = new Student();
        $students->fill($request->all());
        if($students->save()){
            return response('OK', 200)
            ->header('Content-Type', 'text/json');
        } else{
            return response('Erro', 502)
            ->header('Content-Type', 'text/json');
        }
        });

        Route::delete('/students/{id}', function($id){
            $s = Student::find($id);
            if($s->delete()){
                return response('OK', 200)
                ->header('Content-Type', 'text/json');
            }
       });

       Route::put('/students/{id}', function(Request $request, $id){
           $students = Student::find($id);
           $students->fill($request->all());
           if($students->save()){
            return response('OK', 200)
            ->header('Content-Type', 'text/json');
           }
       Route::patch('/students/{id}', function(Request $request, $id){
           $students = Student::find($id);
           $students->fill($request->all());
           if($students->save()){
            return response('OK', 200)
            ->header('Content-Type', 'text/json');
           }

            });
        });
    });
