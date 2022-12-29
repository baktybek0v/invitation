<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Invitee;
use App\Models\InviteeQr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WebController extends Controller
{
	private function findInviteeAuthor($uniqCode) {
		foreach (Invitee::all() as $invitee) {
			if (Hash::check($invitee->id.$invitee->email, $uniqCode)) {
				return $invitee;
			}
		}
	}

    public function invitation(Request $request)
    {
		$eventId = $request->input('event_id');
		$uniqCode = $request->input('uniq_code');

		if (!$eventId)   dd('что то пошло не так');
		if (!$uniqCode)  dd('что то пошло не так');

		$event = Event::find($eventId);
		$invitee = $this->findInviteeAuthor($uniqCode); 

		if ($invitee) {
			return view("web.invitees.index", compact('invitee', 'event', 'eventId', 'uniqCode'));
		} else {
			return redirect()->route("web.invitation_qr", $event);
		}

    }

	public function answer(Request $request)
    {
		$eventId = $request->input('event_id');
		$uniqCode = $request->input('uniq_code');
		$answer = $request->input('answer');

		if (!$eventId)   dd('что то пошло не так');
		if (!$uniqCode)  dd('что то пошло не так');
		if (!$answer) 	 dd('что то пошло не так');
		
		$event = Event::find($eventId);
		$invitee = $this->findInviteeAuthor($uniqCode); 
		$invitee->status = $answer;
		$invitee->save();

        return redirect()->route('web.invitation', ['event' => $event, 'event_id' => $eventId, 'uniq_code' => $uniqCode]);
    }


	// qr::START

	public function qrInvitation(Event $event) {
		$registered = Cookie::get('registered');
		$answer = Cookie::get('answer');

		if ($registered) {
			return view("web.invitees.qr.answer", compact('event', 'answer'));
		} else {
			return view("web.invitees.qr.index", compact('event'));
		}
	}

	public function qrAnswer(Event $event, $answer, Request $request) {
		$registered = Cookie::get('registered');

		if (!$registered) {
			$invitee = new InviteeQr();
			$event->invitees()->save($invitee);
	
			if ($answer == 'reject') {
				$invitee->status = 'reject';
				$invitee->save();
			}
			else if ($answer == 'accept') {
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

 		return response(view("web.invitees.qr.answer", compact('event', 'answer')))
			->cookie('registered', true, 60 * 2)
			->cookie('answer', $answer, 60 * 2);
	}

	// qr::END

}