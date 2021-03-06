<?php
Route::any('/proof', 'GetPaymentController@getIncomingPayment');
Route::get('/test', 'HomeController@test')->name('home');
Route::get('/botman/tinker', 'BotManController@tinker');
Route::post('/fb/store', 'FeedbackController@store');
Route::get('/fb/{nickname}', 'FeedbackController@create');
route::get('/get-full-fb-list','FeedbackController@getFullFbList')->middleware('auth');
Route::get('/startmaster','StartController@start')->middleware('auth');
Route::post('/showfb', 'FeedbackController@show')->middleware('auth');
Route::post('/changequestions/store', 'QuestionController@store')->middleware('auth');
Route::post('/changequestions', 'QuestionController@change')->middleware('auth');
Route::get('/showanswer', 'AnswerController@show')->middleware('auth');
Route::get('/objects','ObjectController@getListOfObject')->middleware('auth');
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
Route::post('/_posters', 'PosterController@showPostersList')->middleware('auth');
Route::get('/getposter', 'PosterController@getPoster')->middleware('auth');
Route::get('/getsettings','SettingController@getSettings')->middleware('auth');
Route::post('/storesettings','SettingController@storeSettings')->middleware('auth');
Route::post('/banner','BannerController@showBanner')->middleware('auth');
Route::get('/banner/change','BannerController@changeBanner')->middleware('auth');
Route::post('/banner/doUpload','BannerController@storeBanner')->middleware('auth');
route::get('/info','HomeController@getInfo')->middleware('auth');
route::get('/info-info','HomeController@infoInfo')->middleware('auth');

route::get('/help','HelpController@showHelp')->middleware('auth');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
Route::get('/home', 'HomeController@getHomeScreen')->name('home');
