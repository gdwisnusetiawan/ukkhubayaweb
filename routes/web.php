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

Route::get('/', 'ViewerController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('storage/{filename}', 'HomeController@displayImage')->name('storage.displayImage');

Route::resource('users', 'UserController');
Route::resource('faculties', 'FacultyController');
Route::resource('members', 'MemberController');
Route::resource('periods', 'PeriodController');
Route::resource('positions', 'PositionController');
Route::resource('programs', 'ProgramController');
Route::resource('managements', 'ManagementController');
Route::resource('management.member', 'ManagementMemberController');
Route::resource('events', 'EventController');
Route::resource('committees', 'CommitteeController');
Route::resource('committee.member', 'CommitteeMemberController');
Route::resource('contacts', 'ContactController');
Route::resource('member.contact', 'ContactMemberController');
Route::resource('profiles', 'ProfileController');

// create management from period show page
Route::get('managements/create/{period}', 'ManagementController@create')->name('managements.createPeriod');
// create committee from event show page
Route::get('committees/create/{event}', 'CommitteeController@create')->name('committees.createEvent');