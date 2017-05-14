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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tests/{id}', function($id) {

  $test = App\Test::find($id);
  echo 'The name of test is; ' . $test->title;

});

Route::get('get_eur/{id}', function($id) {

  return App\Rate::select('data_tabeli', 'kurs')->where('waluta_id', 1)->take($id*30)->get();

});

Route::get('get_usd/{id}', function($id) {

  $rates =  App\Rate::select('data_tabeli', 'kurs')->where('waluta_id', 2)->take($id*30)->get();

  return $rates;

});

Route::get('eur', function() {
  return view('eur');
});

Route::get('usd', function() {
  return view('usd');
});

Route::get('show_eur/{id}', function($id) {

  $data = array( 'id' => $id);

  return view('show_eur', $data);

});
