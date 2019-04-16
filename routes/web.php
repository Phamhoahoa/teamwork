<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Route::get('/', function () {
|   return view('welcome');
| });
|
*/
Route::get('/home','HomeController@getHome');

Route::get('/message', function(){
    return view('client.messages.messages');
});
Route::get("/profile",function(){
    return view('client.userProfileFeed.userProfileFeed');
});
Route::get('/test',function(){
return view('client.layout.home');
});
Route::get('/login', function(){
    return view('admin.login');
});
Route::get('setting', function(){
    return view('client.setting.setting');
});
Route::get('update', function(){
    return view('admin.user.update');
});
Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin')->name('login');

Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'user'], function(){
        Route::get('list','UserController@getList');
        Route::get('add','UserController@getAdd');
        Route::post('add','UserController@postAdd')->name('add');

        Route::get('update/{id}','UserController@getUpdate');
        Route::post('update/{id}','UserController@postUpdate');
        
        Route::get('delete/{id}','UserController@getDelete');
    });
    Route::group(['prefix'=>'course'], function(){
        Route::get('list','CourseController@getList');
        Route::get('add','CourseController@getAdd');
        Route::post('add','CourseController@postAdd')->name('add');

        Route::get('update/{id}','CourseController@getUpdate');
        Route::post('update/{id}','CourseController@postUpdate');
        
        Route::get('delete/{id}','CourseController@getDelete');
    });
    Route::group(['prefix'=>'status'], function(){
        Route::get('list','StatusController@getList');
        Route::get('add','StatusController@getAdd');
        Route::post('add','StatusController@postAdd')->name('add');

        Route::get('update/{id}','StatusController@getUpdate');
        Route::post('update/{id}','StatusController@postUpdate');
        
        Route::get('delete/{id}','StatusController@getDelete');
    });
    Route::group(['prefix'=>'category'], function(){
        Route::get('list','CategoryController@getList');
        Route::get('add','CategoryController@getAdd');
        Route::post('add','CategoryController@postAdd')->name('add');

        Route::get('update/{id}','CategoryController@getUpdate');
        Route::post('update/{id}','CategoryController@postUpdate');
        
        Route::get('delete/{id}','CategoryController@getDelete');
    });
    Route::group(['prefix'=>'comment'], function(){
        Route::get('list','CommentController@getList');
        Route::get('add','CommentController@getAdd');
        Route::get('update','CommentController@getUpdate');
    });
    Route::group(['prefix'=>'participant'], function(){
        Route::get('list','ParticipantController@getList');
        Route::get('add','ParticipantController@getAdd');
        Route::get('update','ParticipantController@getUpdate');
    });
    Route::group(['prefix'=>'conversation'], function(){
        Route::get('list','ConversationController@getList');
        Route::get('add','ConversationController@getAdd');
        Route::get('update','ConversationController@getUpdate');
    });
    Route::group(['prefix'=>'message'], function(){
        Route::get('list','MessageController@getList');
        Route::get('add','MessageController@getAdd');
        Route::get('update','MessageController@getUpdate');
    });

});

