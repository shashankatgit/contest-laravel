<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('getLogin');
});

Route::get('/admin', function () {
    return redirect()->route('getAdminLogin');
});

Route::get('/login', [
    'uses' => 'UserLoginController@getLogin',
    'as' => 'getLogin'
]);

Route::post('/login', [
    'uses' => 'UserLoginController@postLogin',
    'as' => 'postLogin'
]);


Route::get('/admin/login', [
    'uses' => 'AdminLoginController@getLogin',
    'as' => 'getAdminLogin'
]);

Route::post('/admin/login', [
    'uses' => 'AdminLoginController@postLogin',
    'as' => 'postAdminLogin'
]);

/* ---
        USER GROUP

*/
Route::group(['prefix' => '/user', 'middleware' => ['auth:users']], function () {

    Route::get('/home', [
        'as' => 'user.home',
        function () {
            return view('user.home');
        }]);


    Route::get('/logout', [
        'uses' => 'UserLoginController@getLogout',
        'as' => 'user.logout'
    ]);
});


/*
        Admin routes group
*/

Route::group(['prefix' => '/admin', 'middleware' => ['auth:admins']], function () {
    Route::get('/home', [
        'as' => 'admin.home',
        function () {
            return view('admin.home');
        }
    ]);
    
    Route::get('/add',[
       'uses'=>'AdminActionsController@getAdd',
        'as'=>'admin.add'
    ]);

    Route::post('/add',[
       'uses'=>'AdminActionsController@postAdd',
        'as'=>'admin.postAdd'
    ]);


    Route::get('/edit',[
       'uses' => 'AdminActionsController@getEdit',
        'as' => 'admin.edit',
    ]);



    Route::get('/editQuestion/{id}',[
       'uses' => 'AdminActionsController@getEditQuestion',
        'as' => 'admin.editQuestion'
    ]);
    
    Route::post('/editQuestion',[
       'uses' => 'AdminActionsController@postEditQuestion',
        'as' => 'admin.postEditQuestion'
    ]);



    Route::get('/addAdmin',[
        'uses' => 'AdminActionsController@getAddAdmin',
        'as' => 'admin.addAdmin'
    ]);

    Route::post('/addAdmin',[
       'uses' => 'AdminActionsController@postAddAdmin',
        'as' => 'admin.postAddAdmin'
    ]);
    
    
    Route::get('/manageTeams',[
       'uses' => 'AdminActionsController@getManageTeams',
        'as' => 'admin.manageTeams'
    ]);

    Route::post('/addTeam',[
        'uses' => 'AdminActionsController@postAddTeam',
        'as' => 'admin.postAddTeam'
    ]);

    Route::get('/editTeam/{$id}',[
       'uses' => 'AdminActionsController@getEditTeam',
        'as' => 'admin.editTeam'
    ]);

    Route::post('/editTeam',[
       'uses' => 'AdminActionsController@postEditTeam',
        'as' => 'admin.postEditTeam'
    ]);


    Route::get('questionImage/{id}',[
       'uses'=>'ResourceController@getQuestionImage',
        'as'=>'get.questionimage'
    ]);

    Route::get('/logout', [
        'uses' => 'AdminLoginController@getLogout',
        'as' => 'admin.logout'
    ]);


});



