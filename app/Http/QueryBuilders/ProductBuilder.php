<?php

namespace App\Http\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ProductBuilder extends Builder
{
    public function whereProductLike(string $name)
    {
        return $this->where('name', 'Like', '%' . $name . '%');
    }
}
