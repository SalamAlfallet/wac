<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

use Illuminate\Notifications\Messages\NexmoMessage;
use App\Post;
use Auth;
use Illuminate\Mail\Message;

class NewPost extends Notification
{
    use Queueable;
    protected $post;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'mail', 'database','broadcast',
            // 'nexmo','broadcast','slack'
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('hello' . $notifiable->name)
            ->line('A nwe post" ' . $this->post->title . '" has been created on your site.')
            ->action('View Post', route('posts.view', [$this->post->id]))
            ->line('Thank you for using our application!');
        // ->view('mails.newpost',['post'=>$this->post])
    }


    public function toDatabase($notifiable)
    {
        return [
            'icon' => '',
            'message' => 'A nwe post" ' . $this->post->title . '" has been created .',
            'url' => route('posts.view', [$this->post->id]),

        ];

        
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcas($notifiable)
    {
        return new BroadcastMessage([
        'icon' => '',
        'message' => 'A nwe post" ' . $this->post->title . '" has been created .',
        'url' => route('posts.view', [$this->post->id]),
        'to'=>$notifiable->name,
        'from'=>Auth::user()->name,
    ]);
    // ->view('mails.newpost',['post'=>$this->post])

    }

    public function toArray($notifiable)
    {
        return [
            'icon' => '',
            'message' => 'A nwe post" ' . $this->post->title . '" has been created .',
            'url' => route('posts.view', [$this->post->id]),

        ];
    }


    public function toNexmo($notifiable)
{
    return (new NexmoMessage)
                ->content('Your new post created');
}
}
