<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:web')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'auth:web',
    'prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {


    Route::group(['middleware' => 'admin'], function () {

        Route::get('courses', ['uses' => 'CoursesController@index', 'as' => 'courses.index']);
        Route::post('courses', ['uses' => 'CoursesController@store', 'as' => 'courses.store']);
        Route::get('courses/{id}', ['uses' => 'CoursesController@show', 'as' => 'courses.show'])->where('id', '[0-9]+');
        Route::delete('courses/{id}', ['uses' => 'CoursesController@update', 'as' => 'courses.destroy'])->where('id', '[0-9]+');
        Route::put('courses/{id}', ['uses' => 'CoursesController@update', 'as' => 'courses.update.put'])->where('id', '[0-9]+');
        Route::patch('courses/{id}', ['uses' => 'CoursesController@update', 'as' => 'courses.update.patch'])->where('id', '[0-9]+');

        Route::resource('lessons', 'LessonsController', ['except' => ['create', 'edit']]);
        Route::resource('materials', 'MaterialsController', ['except' => ['create', 'edit']]);

        Route::get('/users/teachers', ['uses' => 'UsersController@getTeachers', 'as' => 'users.teachers']);
        Route::get('/users/students', ['uses' => 'UsersController@getStudents', 'as' => 'users.students']);

        Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);

    });

});

