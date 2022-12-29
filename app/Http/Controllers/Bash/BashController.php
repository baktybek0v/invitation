<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Event;
use App\Models\Invitee;
use Illuminate\Http\Request;

class BashController extends Controller
{
	public function putPermanentEnv($key, $value)
	{
		$path = app()->environmentFilePath();

		$escaped = preg_quote('=' . env($key), '/');

		file_put_contents($path, preg_replace(
			"/^{$key}{$escaped}/m",
			"{$key}={$value}",
			file_get_contents($path)
		));
	}

	public function index(Request $request)
	{
		/*
 		$event = Event::orderBy('id', 'desc')->get()[0];
		$invitee = Invitee::orderBy('id', 'desc')->get()[0];
		$title = 'title';
		return view('bash.events.mailing.index3', compact('event', 'invitee', 'title'));*/

		$events = Event::orderBy('id', 'desc')->take(7)->get();
		$emails = Email::all();
		$sender = Email::where('email', env('MAIL_USERNAME'))->first();
		
		return view('bash.index', compact('events', 'emails', 'sender'));
	}

	public function setting() {
		$emails = Email::all();
		$sender= Email::where('email', env('MAIL_USERNAME'))->first();

		return view('bash.settings.index', compact('emails', 'sender'));
	}

	public function test() {
		dd('test');
	}

}
