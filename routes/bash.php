<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', function() { return redirect()->route('bash.index');});

Route::group(['middleware' => ['auth', 'bash', 'activity']], function(){

	// Auth::routes();
	Route::group(['as' => 'bash.', 'prefix' => "admin"], function () {

		Route::get('/', 'BashController@index')->name('index');
		Route::get('/mail', 'BashController@mail')->name('index.mail');
		Route::get('/ai', 'BashController@ai_test')->name('ai');
		Route::get('/settings', 'BashController@setting')->name('settings');


		// Profile pages
		Route::group(['prefix' => '/profile'], function (){
			Route::get('/', 'ProfileController@profile')->name('profile');
			Route::post('/update', 'ProfileController@update')->name('profile.update');
			Route::post('/change-password', 'ProfileController@changePassword')->name('profile.change.password');
		});

		Route::get('/test', 'BashController@test')->name('test');
		Route::get('/events/{event}/send',  'EventController@send')->name('events.send');
		Route::post('/emails/set',	 			'EmailController@set')->name('emails.set');

		Route::resources([
			//'users'       		=> 'UserController',
			'translations'			=> 'TranslationController',
			'roles'      			=> 'RoleController',
			'permissions'			=> 'PermissionController',

			'events'				=> 'EventController',
			'events.invitees'		=> 'EventInviteeController',
			'events.invitees_qr'	=> 'EventInviteeQrController',
			'invitees.events'		=> 'InviteeEventController',
			'reports'				=> 'ReportController',
			'emails'				=> 'EmailController',
		]);

	});



	/* Лог */
	Route::group(['prefix' => 'activity', 'namespace' => '\jeremykenedy\LaravelLogger\App\Http\Controllers', 'middleware' => ['bash', 'auth', 'activity']], function () {

		// Dashboards
		Route::get('/', 'LaravelLoggerController@showAccessLog')->name('activity');
		Route::get('/cleared', ['uses' => 'LaravelLoggerController@showClearedActivityLog'])->name('cleared');

		// Drill Downs
		Route::get('/log/{id}', 'LaravelLoggerController@showAccessLogEntry');
		Route::get('/cleared/log/{id}', 'LaravelLoggerController@showClearedAccessLogEntry');

		// Forms
		Route::delete('/clear-activity', ['uses' => 'LaravelLoggerController@clearActivityLog'])->name('clear-activity');
		Route::delete('/destroy-activity', ['uses' => 'LaravelLoggerController@destroyActivityLog'])->name('destroy-activity');
		Route::post('/restore-log', ['uses' => 'LaravelLoggerController@restoreClearedActivityLog'])->name('restore-activity');
	});

});
