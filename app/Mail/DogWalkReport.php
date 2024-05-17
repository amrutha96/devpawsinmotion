<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;

class DogWalkReport extends Mailable
{
    use Queueable, SerializesModels;

    public $emailContent;
    public $mediaPath;

    public function __construct($emailContent, $mediaPath)
    {
        $this->emailContent = $emailContent;
        $this->mediaPath = $mediaPath;
    }

    public function build()
    {
        $message = $this->subject('Dog Walk Report');

        if ($this->mediaPath) {
            $message->attach(storage_path('app/media/' . $this->mediaPath));
        }
        dd(storage_path('app/media/' . $this->mediaPath));
        return $message->view('emails.dog_walk_report', [
            'emailContent' => $this->emailContent
        ]);
    }
}
