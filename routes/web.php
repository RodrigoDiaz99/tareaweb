
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contentup;
use App\Models\Contentabout;
use App\Models\Contentobjective;
use App\Models\Contentevent;

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
})->name('welcome');

Route::post('contact/store', 'ContactController@sendEmail')->name('contact_send');

   
    Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('books/list/nCUfSyKo0V/', 'booksController@show')->name('book_show');
    Route::middleware(['role:Super-Admin|Admin|User','permission:index'])->get('dashboard/content/f6sDibVz5A/', 'ContentUpController@view')->name('dashboard_content');
   // Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('articles/list/qtnypB7DxG/', 'ArticlesController@show')->name('article_show');
    Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('conferences/list/hKOlGQSb3d/', 'ConferenceController@show')->name('conference_show');
    Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('videos/list/HIDrAJa0DB/', 'VideoController@show')->name('video_show');

    //Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('conference/frame/{id}/fKm35JtV8l/', 'ConferenceController@frame')->name('conference_frame');
    Route::middleware(['role:Super-Admin|Admin|User','permission:show'])->get('video/frame/{id}/SsVKIv3hI0/', 'VideoController@frame')->name('video_frame');

    // Routes para el Role Super-Admin y Admin
    Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('books/index', 'booksController@index')->name('book_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('book/create/', 'booksController@create')->name('book_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('book/store/', 'booksController@store')->name('book_store');
    
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('book/{id}/edit/', 'booksController@edit')->name('book_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('book/{id}/', 'booksController@update')->name('book_update');
    Route::middleware(['role:Super-Admin|Admin','permission:destroy'])->delete('book/{id}/', 'booksController@destroy')->name('book_destroy');
    
    Route::middleware(['role:Super-Admin|Admin','permission:destroy'])->get('book/{id}/download/', 'booksController@download')->name('book_download');

    //rutas articulos
   /* Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('article/index', 'ArticlesController@index')->name('article_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('article/create/', 'ArticlesController@create')->name('article_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('article/store/', 'ArticlesController@store')->name('article_store');
    
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('article/{id}/', 'ArticlesController@edit')->name('article_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('article/{id}/', 'ArticlesController@update')->name('article_update');
    Route::middleware(['role:Super-Admin|Admin','permission:destroy'])->delete('article/{id}/', 'ArticlesController@destroy')->name('article_destroy');*/

    //rutas de videos
    Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('video/index', 'VideoController@index')->name('video_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('video/create/', 'VideoController@create')->name('video_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('video/store/', 'VideoController@store')->name('video_store');
   
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('video/edit/{id}/', 'VideoController@edit')->name('video_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('video/{id}/', 'VideoController@update')->name('video_update');
    Route::middleware(['role:Super-Admin|Admin','permission:destroy'])->delete('video/{id}/', 'VideoController@destroy')->name('video_destroy');

    //Conferencias
    Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('conference/index', 'ConferenceController@index')->name('conference_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('conference/create/', 'ConferenceController@create')->name('conference_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('conference/store/', 'ConferenceController@store')->name('conference_store');
    
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('conference/edit/{id}/', 'ConferenceController@edit')->name('conference_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('conference/{id}/', 'ConferenceController@update')->name('conference_update');
    Route::middleware(['role:Super-Admin|Admin','permission:destroy'])->delete('conference/{id}/', 'ConferenceController@destroy')->name('conference_destroy');

    //rutas de editar parte de arriba
    /*Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('inicio/view', 'ContentupController@index')->name('contentup_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('inicio/first/create/', 'ContentUpController@create')->name('contentup_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('inicio/first/store/', 'ContentUpController@store')->name('contentup_store');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('inicio/first/edit/{id}/', 'ContentUpController@edit')->name('contentup_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('inicio/first/update/{id}/', 'ContentUpController@update')->name('contentup_update');
    
    //rutas de editar parte de quienes somos y
    Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('inicio/about/list/', 'ContentaboutController@index')->name('contentabout_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('inicio/about/create/', 'ContentaboutController@create')->name('contentabout_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('inicio/about/store/', 'ContentaboutController@store')->name('contentabout_store');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('inicio/about/edit/{id}/', 'ContentaboutController@edit')->name('contentabout_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('inicio/about/update/{id}/', 'ContentaboutController@update')->name('contentabout_update');
    
    //rutas para objetivos
    Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('inicio/objectives/', 'ContentobjectiveController@index')->name('contentobjectives_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('inicio/objectives/create/', 'ContentobjectiveController@create')->name('contentobjectives_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('inicio/objectives/store/', 'ContentobjectiveController@store')->name('contentobjectives_store');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('inicio/objectives/edit/{id}/', 'ContentobjectiveController@edit')->name('contentobjectives_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('inicio/objecetives/update/{id}/', 'ContentobjectiveController@update')->name('contentobjectives_update');

    //rutas para eventos
    Route::middleware(['role:Super-Admin|Admin','permission:index'])->get('inicio/events/', 'ContenteventController@index')->name('contentevent_index');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->get('inicio/events/create/', 'ContenteventController@create')->name('contentevent_create');
    Route::middleware(['role:Super-Admin|Admin','permission:create'])->post('inicio/events/store/', 'ContenteventController@store')->name('contentevent_store');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->get('inicio/events/edit/{id}/', 'ContenteventController@edit')->name('contentevent_edit');
    Route::middleware(['role:Super-Admin|Admin','permission:edit'])->put('inicio/events/update/{id}/', 'ContenteventController@update')->name('contentevent_update');*/

