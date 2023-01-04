<?php

namespace App\Events;

use App\Models\Product;

class ProductCreatedEvent
{

    public function __construct(Product $product)
    {
        $this->product = $product ;
    }

}
