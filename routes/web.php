<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale().'/',
		'middleware' => [
			'web',
			'localeSessionRedirect',
			'localizationRedirect',
			'localeViewPath',
			'localize',
		],
		'as' => 'web.',
	],
	function()
    {
		Route::get('invitation', 'WebController@invitation')->name('invitation');
		Route::get('invitation/answer', 'WebController@answer')->name('invitation.answer');
		Route::get('invitation/qr/{event}', 'WebController@qrInvitation')->name('invitation_qr');
		Route::match(['get', 'post'], 'invitation/qr/{event}/{answer}', 'WebController@qrAnswer')->name('invitation_qr.answer');
	}
);



	// Временно
Route::group( ['middleware' => 'web', 'as' => 'web.'], function() {
	Route::get('event/registration/23853714', 'SpecificQrController@qrInvitation')->name('invitation_specific_qr');
	Route::match(['get', 'post'], 'event/registration/23853714/{answer}', 'SpecificQrController@qrAnswer')->name('invitation_specific_qr.answer');
});