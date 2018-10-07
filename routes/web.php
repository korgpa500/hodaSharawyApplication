<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * Route::get('/', function () {
 * return view('welcome');
 * })->name('welcome');
 **/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//for suggestion message
Route::post('/suggestions', 'SuggestionController@store');// guest send suggestion

//pages
Route::get('/', 'PagesController@welcome')->name('welcome');//welcome page
Route::get('/eventsShow', 'PagesController@eventsShow');//events page
Route::get('/photos', 'PhotoController@index')->name('photos.index');//gallery page
Route::get('/photos/{section_id}/showPhotos', 'PhotoController@show')->name('photos.show');//gallery section
Route::get('/kg', 'PagesController@kgView');//kg page
Route::get('/junior', 'PagesController@juniorView');//junior page
Route::get('/middle', 'PagesController@middleView');//middle page
Route::get('/senior', 'PagesController@seniorView');//senior page
Route::get('/blog', 'PagesController@blogView');//blog page
Route::get('/blog/{section_id}/showBlog', 'PagesController@showBlog')->name('blog.show');//blog section


//register
Route::get('/users/register', 'RegisterController@show')->name('users.register');// registerPageForm
Route::post('users/post', 'RegisterController@register')->name('users.register');//registerPageSubmit


//routes for admin only
Route::group(['middleware' => ['checkAdmin']], function () {

    /**************News *********************/
    Route::get('/events', 'EventController@index')->name('events.index');//show all events
    Route::post('/events', 'EventController@store'); //store new post
    Route::get('/events/{event_id}/destroy', 'EventController@destroy'); //delete Event

    /////////////////////////////////////////////////////////////////////
    /**************types******************/

    Route::get('/types', 'TypeController@index')->name('types.index');//show all types
    Route::post('/types', 'TypeController@store')->name('types.store');//save new type
    Route::get('/types/{type_id}', 'TypeController@show')->name('types.show');//show one type in same page
    Route::post('/types/{type_id}/edit', 'TypeController@edit')->name('types.edit');//edit one type
    Route::get('/types/{type_id}/delete', 'TypeController@destroy')->name('types.destroy');//delete one type


    /////////////////////////////////////////////////////////////////////////////////////////////////
    /*******************sections********************/

    Route::get('/sections', 'SectionController@index')->name('sections.index');//show all sections
    Route::post('/sections', 'SectionController@store')->name('sections.store');//save new section
    Route::get('/sections/{section_id}', 'SectionController@show')->name('sections.show');//show one section in same page
    Route::post('/sections/{section_id}/edit', 'SectionController@edit')->name('sections.edit');//edit one section
    Route::get('/sections/{section_id}/delete', 'SectionController@destroy')->name('sections.destroy');//delete one section

    //////////////////////////////////////////////////////////////////////////////////////////////////
    /**********************users*********************/

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{user_id}/delete', 'UserController@delete')->name('users.delete');//delete user from user table
    Route::get('/users/{user_id}/edit', 'UserController@edit')->name('users.edit');
    Route::post('users', 'UserController@update');

    ///////////////////////////////////////////////////////////////////////////////////////////////
    /**********************Gallery*********************/
    Route::get('/photos/create', 'PhotoController@create')->name('photos.create');
    Route::post('/photos', 'PhotoController@store')->name('photos.store');
    Route::get('/photos/{photo_id}/deletePhoto', 'PhotoController@delete')->name('photos.delete');

    //////////////////////////////////////////////////////////////////////////////////////////////
    /*******************Notification**********************/
    /*********suggestions**************/
    Route::get('/notification', 'NotificationController@index')->name('notifications.index');//show all notification
    Route::get('/notification/{suggestion_id}/suggestion', 'NotificationController@showSuggestion')->name('notification.suggestion.show');//show message notification
    Route::get('/notification/{suggestion_id}/suggestion_del', 'NotificationController@deleteSuggestion');//del suggestion
    /**********Users Registered***********/
    Route::get('/notification/{register_id}/show', 'NotificationController@showUser');//show user notification
    Route::get('/notification/{register_id}/addUserRegistered', 'NotificationController@addUserRegistered');//add new registered users(approve)
    Route::get('/notification/{register_id}/ignoreUserRegistered', 'NotificationController@ignoreUserRegistered');//ignore user registered

    /////////////////////////////////////////////////////////////////////////////////////////////
    /**************************Posts************************************/
    Route::get('/posts/{post_id}/destroy', 'PostController@destroy'); //delete post and likes
});

//route for users
//Route::post('/posts', 'PostController@store')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/posts', 'PostController@store'); //store new post
    Route::get('/posts/{post_id}/add_like', 'LikeController@store'); //store new like to post
});


