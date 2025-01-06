<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StockNotification extends Notification
{
    use Queueable;

    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Stock Alert: ' . $this->product->name)
            ->line('The stock for this product is low: ' . $this->product->stock)
            ->action('View Product', url('/products/' . $this->product->id))
            ->line('Please restock as soon as possible.');
    }

    public function toArray($notifiable)
    {
        return [
            'product_id' => $this->product->id,
            'name' => $this->product->name,
            'stock' => $this->product->stock,
        ];
    }
}
