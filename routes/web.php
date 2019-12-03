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

Route::post('insert' , 'excelController@importExcel');
Route::get('/' , 'generalController@index');
Route::get('index' , 'generalController@index');
Route::get('all_students' , 'generalController@students');
Route::get('documents' , 'generalController@documents');
Route::get('dropedout' , 'generalController@dropedout');
Route::get('users' , 'uController@users');
Route::get('user_profile{id}' , 'uController@user_profile');
Route::post('u_profile{id}' , 'uController@u_profile');
Route::get('upload' , 'generalController@upload');
Route::get('upload_dr' , 'generalController@upload_dr');
Route::get('black_list' , 'generalController@black_list');
Route::get('add_documents' , 'generalController@add_documents');
Route::post('ins_document' , 'documentController@add');
Route::post('drop' , 'generalController@drop');
Route::post('block' , 'generalController@block');
Route::get('index7' , 'generalController@index7');
Route::get('indexps' , 'generalController@indexps');
Route::get('all_students_dr' , 'generalController@students_dr');
Route::get('dropedout_dr' , 'generalController@dropedout_dr');
Route::get('black_list_dr' , 'generalController@black_list_dr');
Route::get('documents_dr' , 'generalController@documents_dr');
Route::get('add_documents_dr' , 'documentController@add_documents_dr');
Route::get('users_dr' , 'uController@users_dr');
Route::get('report_dr' , 'reportController@report_dr');
Route::get('syslog_dr' , 'generalController@syslog_dr');
Route::get('login1' , 'generalController@login');
Route::post('get_l' , 'generalController@get_l');
Route::get('logout' , 'uController@logout');
Route::get('registeration' , 'uController@registeration');
Route::post('g' , 'generalController@g');
Route::get('report' , 'reportController@report');
Route::get('search_for_report' , 'reportController@search_for_report');
Route::get('locale/{locale}' , 'languageController@localization');
Route::get('export' , 'reportController@exportExcel');
Route::get('sys_logs' , 'generalController@sys_logs')->middleware('role:super');
Route::get('delete/{id}' , 'uController@delete');

/* Route For Searching Of Students */

Route::get('search' , 'generalController@search');

/* Route For searching DropedOut Students */

Route::get('search_dropout' , 'generalController@search_dropout');

/* Route For Searching Black List Students */

Route::get('search_black' , 'generalController@search_black');

/* End Of Route */

/* Route For Searching Of Documents */

Route::get('doc_search' , 'documentController@doc_search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
