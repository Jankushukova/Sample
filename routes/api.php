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
    Route::group([], function () {
        //courses
        Route::get('users/current', ['uses' => 'UsersController@getCurrent', 'as' => 'users.getCurrent']);
        Route::get('users/{client_id}', ['uses' => 'UsersController@show', 'as' => 'users.show'])->where('id', '[0-9]+');

        Route::get('requests', ['uses' => 'MessagesController@index', 'as' => 'messages.index']);
        Route::get('requests/current', ['uses' => 'MessagesController@getMessagesOfCurrentUser', 'as' => 'messages.getMessagesOfCurrentUser']);
        Route::post('requests', ['uses' => 'MessagesController@store', 'as' => 'messages.store']);
        Route::get('requests/{id}', ['uses' => 'MessagesController@show', 'as' => 'messages.show'])->where('id', '[0-9]+');
        Route::patch('requests/{id}', ['uses' => 'MessagesController@update', 'as' => 'message.update.put'])->where('id', '[0-9]+');
//        Route::patch('courses/{id}', ['uses' => 'CoursesController@update', 'as' => 'courses.update.patch'])->where('id', '[0-9]+');
    });

    //    Route::group([], function () {
//        //courses
//        Route::get('courses', ['uses' => 'CoursesController@index', 'as' => 'courses.index']);
//
//
//        //lessons
//        Route::get('lessons/{id}', ['uses' => 'LessonsController@index', 'as' => 'lessons.index'])->where('id', '[0-9]+');
//
//
//        //materials
//        Route::get('materials/{lesson_id}', ['uses' => 'MaterialsController@index', 'as' => 'materials.index'])->where('id', '[0-9]+');
//        Route::post('materials', ['uses' => 'MaterialsController@store', 'as' => 'materials.store']);
//
//
//        //users
//        Route::get('/users/current', ['uses' => 'UsersController@getCurrent', 'as' => 'users.current']);
//
//        //groups
//        Route::get('groups', ['uses' => 'GroupsController@index', 'as' => 'groups.index']);
//
//        //groupsTeachers
//        Route::get('groupsTeachers/{id}', ['uses' => 'GroupsTeachersController@index', 'as' => 'groupsTeachers.index'])->where('id', '[0-9]+');
//
//
//        //groupsStudents
//        Route::get('groupsStudents/{id}', ['uses' => 'GroupsStudentsController@index', 'as' => 'groupsStudents.index'])->where('id', '[0-9]+');
//
//
//        //StudentAccesses
//        Route::post('student/access/courses/save', ['uses' => 'StudentAccessController@saveAll', 'as' => 'student.access.store']);
//        Route::get('student/access/except/courses/{user_id}', ['uses' => 'StudentAccessController@getMyNotAvailableCourses', 'as' => 'student.access.index']);
//        Route::get('student/access/courses/{user_id}', ['uses' => 'StudentAccessController@getMyAvailableCourses', 'as' => 'student.access.index']);
//
//
//    });
}


);

