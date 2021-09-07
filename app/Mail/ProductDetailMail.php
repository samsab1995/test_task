<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductDetailMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private Product $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ProductDetailMail
    {
        return $this->markdown('emails.product-detail')->with([
            'product' => $this->product,
        ]);
    }
}
