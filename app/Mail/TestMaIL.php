<?php

namespace App\Mail;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMaIL extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, Post $post)
    {
        $this->name = $name;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.emailtest')
            ->subject("Este assunto é de um seminário - [$this->name]")
            ->from('emailqualquer@qualquer.com.br', "Pessoa que envia e-mail")
            ->to("jefferson.pereira@gmail.com", "Jefferson Pereira");
    }
}
