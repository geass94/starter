<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $rawPassword
     */
    public function __construct(User $user, string $rawPassword)
    {
        $this->user = $user;
        $this->password = $rawPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->with([
            'rawPassword' => $this->password
        ])
            ->view('mails.account-created');
    }
}
