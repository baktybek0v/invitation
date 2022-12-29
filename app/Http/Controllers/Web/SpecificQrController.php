<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\InviteeQr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SpecificQrController extends Controller
{
	public function __construct() {
		$env = app()->environment();

		if ($env == 'public')  $eventId = config('global.hardcoded_event_public');
		if ($env == 'local')  $eventId = config('global.hardcoded_event_local');
		
		$this->event = Event::find($eventId);
	}

	public function qrInvitation(Request $request) {
		$event = $this->event;
		$answer = Cookie::get('answer');

		$registered = Cookie::get('registered');

		if ($registered) { 
			$lang = Cookie::get('lang');
			return view("web.invitees.specific_qr.answer", compact('event', 'answer', 'lang'));
		} else {
			$lang = $request->input('lang');
			return view("web.invitees.specific_qr.index", compact('event', 'lang'));
		}
	}

	public function qrAnswer(Request $request, $answer) {
		$registered = Cookie::get('registered');

		$event = $this->event;
		$lang = $request->input('lang');

		if (!$registered) {
			$invitee = new InviteeQr();
			$event->invitees()->save($invitee);

			if ($answer == 'reject') {
				$invitee->status = 'reject';
				$invitee->save();
			} else if ($answer == 'accept') {
				$invitee->status = 'accept';
				$invitee->full_name = $request->input('full_name');
				$invitee->email = $request->input('email');
				$invitee->organization = $request->input('organization');
				$invitee->job = $request->input('job');
				$invitee->save();
			} else {
				$invitee->delete();
			}
		}

		return response(view("web.invitees.specific_qr.answer", compact('event', 'answer', 'lang')))
			->cookie('registered', true, 60 * 2)
			->cookie('answer', $answer, 60 * 2)
			->cookie('lang', $lang, 60 * 2);
	}
}