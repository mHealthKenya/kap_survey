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

Route::get('/survey', 'SurveyController@index')->name('survey');
Route::post('/get_subcounties', 'SurveyController@getSubCounties')->name('get_subcounties');
Route::post('/get_facilities', 'SurveyController@getFacilities')->name('get_facilities');
Route::post('/add/survey', 'SurveyController@addSurvey')->name('addSurvey');
Route::post('/add/demographics', 'SurveyController@addDemographics')->name('addDemographics');
Route::post('/knowledge/three', 'SurveyController@demographicsPartThree')->name('moreDemographics');
Route::post('/add/knowledge/one', 'SurveyController@addKnowledgeOne')->name('addKnowledgeOne');



