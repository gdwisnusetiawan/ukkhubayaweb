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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('storage/{filename}', 'HomeController@displayImage')->name('storage.displayImage');

Route::resource('users', 'UserController');
Route::resource('faculties', 'FacultyController');
Route::resource('members', 'MemberController');
Route::resource('periods', 'PeriodController');
Route::resource('positions', 'PositionController');
Route::resource('programs', 'ProgramController');
Route::resource('managements', 'ManagementController');
Route::resource('events', 'EventController');
Route::resource('committees', 'CommitteeController');
Route::resource('committee.member', 'CommitteeMemberController');
Route::resource('contacts', 'ContactController');
Route::resource('member.contact', 'ContactMemberController');

Route::get('managements/create/{period}', 'ManagementController@create')->name('managements.createPeriod');
Route::get('managements/{management}/edit/{period}', 'ManagementController@edit')->name('managements.editPeriod');

Route::get('committees/create/{event}', 'CommitteeController@create')->name('committees.createEvent');
Route::get('committees/{committee}/edit/{member}', 'CommitteeController@edit')->name('committees.editMember');
