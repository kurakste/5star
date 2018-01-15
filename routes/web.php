<?php



//Route::get('/get/{id}', 'ClientController@getClient');
//Route::get('/main', 'ClientController@main');
//Route::post('/storeclient', 'ClientController@store');
Route::post('/fb/store', 'FeedbackController@store');
Route::get('/fb/{nickname}', 'FeedbackController@create');
Route::post('/showfb', 'FeedbackController@show')->middleware('auth');
Route::post('/changequestions/store', 'QuestionController@store')->middleware('auth');
Route::post('/changequestions', 'QuestionController@change')->middleware('auth');
Route::get('/showanswer', 'AnswerController@show')->middleware('auth');
Route::get('/createclient', 'ClientController@create')->middleware('auth');
Route::get('/addclient', 'ClientController@store')->middleware('auth');
Route::get('/object/add', 'ObjectController@add')->middleware('auth');
Route::post('/object/edit', 'ObjectController@edit')->middleware('auth');
Route::post('/object/store', 'ObjectController@store')->middleware('auth');
Route::post('/object/delete', 'ObjectController@del')->middleware('auth');
Route::post('/object/finishdel', 'ObjectController@finishdel')->middleware('auth');
Route::get('/bill/charge', 'BillController@rechargeTheBalance')->middleware('auth');
Route::post('/bill/store', 'BillController@store')->middleware('auth');
Route::get('/bill/details', 'BillController@billDetails')->middleware('auth');
Route::post('/downloadQR', 'ObjectController@downloadQR')->middleware('auth');
Route::get('/showtariffs','TariffController@showTariffs')->middleware('auth');



Auth::routes();
Route::get('/home', 'HomeController@dashboard')->name('home');
