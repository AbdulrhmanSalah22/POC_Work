<?php

namespace App\Subscribers;

use App\Events\ProductCreatedEvent;

class ProductSubscriber
{

    public function __construct()
    {
    }

    public function ProductCreated($event){
        info($event->product);
    }

    public function subscribe()
    {
        return [
          ProductCreatedEvent::class => 'ProductCreated'
        ];

    }
}
