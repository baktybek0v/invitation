<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Invitee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

	// public properties will be automaticly avialable in views that builded

	public $event;
	public $invitee;


    public function __construct(Event $event, Invitee $invitee)
    {
        $this->event = $event;
		$this->invitee = $invitee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$inviteePreferredLang = $this->invitee->getFirstLang();
		$title = $this->event->getTitle($inviteePreferredLang);

		$address = config("mail.mailers.smtp.username");

		return $this->from($address)
					->subject($title)
					->view('bash.events.mailing.index4')
					->with(['title' => $title]);
    }
}
