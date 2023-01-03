<?php

namespace App\Http\DTOs;

use App\Models\Product;

class ProductData
{
    public int $id ;
    public string $name ;
    public int $categoryId;
    public function __construct(int $id , string $name , int $categoryId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->categoryId = $categoryId;
    }

    public function toArray(): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'details'    => $this->categoryId,
        ];
    }

}
