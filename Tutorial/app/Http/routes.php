<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Home\IndexController@index');
    Route::get('/lesson', 'Home\IndexController@lesson');

    Route::get('/lessonlist', 'Home\IndexController@lessonlist');
    Route::get('/workhistory/{cour_id}', 'Home\IndexController@workhistory');
    Route::get('/workfeedback/{hw_id}', 'Home\IndexController@workfeedback');

    Route::any('/yuncampus', 'Home\IndexController@yuncampus');
    Route::any('/picture', 'Home\IndexController@picture');
    Route::any('/cloudclass', 'Home\IndexController@cloudclass');
    Route::get('/courvideo/{cour_id}', 'Home\IndexController@courvideo');
    Route::get('/videoplay/{cv_id}', 'Home\IndexController@videoplay');


    Route::get('/tkol/{cour_id}', 'Home\IndexController@tkol');
    Route::post('/tkolpost', 'Home\IndexController@tkolpost');
    Route::get('/putwork', 'Home\IndexController@putwork');
    Route::post('/putworkpost', 'Home\IndexController@putworkpost');
    Route::get('/puttask/{task_id}', 'Home\IndexController@puttask');
    Route::get('/courfile/{cour_id}', 'Home\IndexController@courfile');

    Route::post('/login', 'Home\LoginController@login');
    Route::get('/logout', 'Home\LoginController@logout');

    Route::any('/upload', 'Home\CommonController@upload');

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');

});


Route::group(['middleware' => ['web','admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //后台登录以后才能访问的页面
    Route::get('/', 'IndexController@index');
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('logout', 'LoginController@logout');
    Route::any('pass', 'IndexController@pass');


    Route::resource('student', 'StudentController');
    Route::post('student/changeorder', 'StudentController@changeOrder');

    Route::resource('teacher', 'TeacherController');
    Route::post('teacher/changeorder', 'TeacherController@changeOrder');

    Route::resource('course', 'CourseController');
    Route::post('course/changeorder', 'CourseController@changeOrder');

    Route::resource('task', 'TaskController');
    Route::post('task/changeorder', 'TaskController@changeOrder');

    Route::resource('homework', 'HomeworkController');
    Route::get('evaluate/{task_id}', 'HomeworkController@evaluate');
    Route::post('homework/changeorder', 'HomeworkController@changeOrder');
    Route::get('scorelist/{cour_id?}', 'HomeworkController@scorelist');

    Route::resource('courfile', 'CourfileController');
    Route::post('courfile/changeorder', 'CourfileController@changeOrder');

    Route::resource('courvideo', 'CourvideoController');
    Route::post('courvideo/changeorder', 'CourvideoController@changeOrder');

    Route::any('uploadimg', 'CommonController@uploadimg');
    Route::any('uploadtaskfile', 'CommonController@uploadtaskfile');
    Route::any('uploadcourfile', 'CommonController@uploadcourfile');
    Route::any('uploadcourvideo', 'CommonController@uploadcourvideo');
});



/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
//    //
//});

//Route::group(['middleware' => ['web']], function () {
//    Route::any('/login', 'Home\LoginController@login');
//    Route::any('/logout', 'Home\LoginController@logout');
//    Route::any('/register', 'Home\LoginController@register');
//
//
//    Route::get('/', 'Home\IndexController@index');
//    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
//    Route::get('/a/{art_id}', 'Home\IndexController@article');
//    Route::post('/search', 'Home\IndexController@search');
//
//
//    Route::any('admin/login', 'Admin\LoginController@login');
//    Route::get('admin/code', 'Admin\LoginController@code');
//
//});

