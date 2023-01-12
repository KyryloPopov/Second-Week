<?php

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



Route::get('/register', 'MainController@register');
Route::get('/', 'HomeController@index');
Route::get('/conferences', 'ConferenceController@index')->name('conference.index');
Route::group(['middleware' => 'conference.create'], function (){
    Route::get('/conferences/create', 'ConferenceController@create')->name('conference.create');
    Route::post('/conferences', 'ConferenceController@store')->name('conference.store');
});
Route::get('/conferences/{conference}', 'ConferenceController@show')->name('conference.show');
Route::group(['middleware' => 'conference.edit'], function (){
    Route::get('/conferences/{conference}/edit', 'ConferenceController@edit')->name('conference.edit');
    Route::patch('/conferences/{conference}', 'ConferenceController@update')->name('conference.update');
    Route::delete('/conferences/{conference}', 'ConferenceController@destroy')->name('conference.destroy');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
