<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'App\Http\Controllers','prefix'=>'student'],function(){
   Route::get('/','StudentController@index')->name('student.index');
   Route::get('/show/{id}','StudentController@show')->name('student.show');
   Route::get('/all','StudentController@all')->name('student.all');
   Route::post('/store','StudentController@store')->name('student.store');
   Route::get('/delete/{id}','StudentController@delete')->name('student.delete');
   Route::get('/edit/{id}','StudentController@edit')->name('student.edit');
   Route::post('/update/{id}','StudentController@update')->name('student.update');

});
