<?php
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('welcome');
});

//show the login form 
// Route::get('/', array(
//     'uses' => 'MainController@showLogin'
// ));

//route to process the form
// Route::post('login',
//  array('uses'=>'MainController@doLogin')

// );

// //for logout
// Route::get('logout', array(
//     'uses' => 'MainController@doLogout'
// ));

Auth::routes();




//Tasks routes
Route::get('/','TaskController@index');

Route::post('/task', 'TaskController@store');

Route::delete('/task/{id}', 'TaskController@destroy');

Route::get('/file', 'FileController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', 'FileController@upload')->name('upload');