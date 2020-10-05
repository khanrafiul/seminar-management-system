<?php

Route::get('/', function () {
    return view('auth.login');
});

//-----------------------Website Routes Start---------------------
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', '\App\Http\Controllers\website\WebsiteController@index');

Route::group(['prefix'=>'website','middleware'=>['admin','student'],'namespace'=>'website'],function(){
	Route::get('', 'WebsiteController@index')->name('website/dashboard');
	Route::get('seminar/details/{id}', 'WebsiteController@show');

	Route::post('seminar/details/{id}', 'WebsiteController@insert');
});


//-----------------------Admin Routes Start-------------------------
Auth::routes();
Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>['admin','teacher','preventBack']],function(){
    Route::get('', 'AdminController@index')->name('admin/dashboard');

    Route::resource('user', 'UserController');
    Route::put('user/status/{id}', 'UserController@status');

    Route::get('recycle/user', 'UserRecycleController@index');
    Route::get('recycle/user/show/{id}', 'UserRecycleController@show');
    Route::get('recycle/user/restore/{id}', 'UserRecycleController@restore');
  	Route::delete('recycle/user/delete/{id}', 'UserRecycleController@delete');

  	Route::resource('course', 'CourseController');
  	Route::get('course/{id}', 'CourseController@view');

  	Route::resource('teacher', 'TeacherController');
  	Route::put('teacher/status/{id}', 'TeacherController@status');

  	Route::get('manage', 'ManageController@index');

  	Route::resource('seminar', 'SeminarController');

  	Route::resource('student', 'StudentController');
  	Route::put('student/status/{id}', 'StudentController@status');

});


