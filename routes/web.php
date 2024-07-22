<?php

use App\Http\Controllers\CourseUserController;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    /**
     * Matriculacion
     */
    Route::get('/index-matriculation', [CourseUserController::class, 'Index'])
    ->name('courses-user.index');

    Route::post('/create-matriculation/{course}', [CourseUserController::class, 'Matriculation'])
    ->name('courses-user.matriculation');


    //------------------------------------------------------------------------

});
