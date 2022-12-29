<?php

namespace App\Mail;

use App\Models\Statement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatementCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Statement $statement;

    /**
     * Create a new message instance.
     *
     * @param Statement $statement
     */
    public function __construct(Statement $statement)
    {
        $this->statement = $statement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->statement->getStatementLawyer->email)
            ->subject("Вы назначены адвокатом...")
            ->view('bash.emails.statement_created')
            ->with('statement');
    }
}
