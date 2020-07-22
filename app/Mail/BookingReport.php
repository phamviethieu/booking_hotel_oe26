<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingReport extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $bookings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $bookings)
    {
        $this->data = $data;
        $this->bookings = $bookings;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('message.email.subject'))
            ->markdown('emails.booking_mail');
    }
}
