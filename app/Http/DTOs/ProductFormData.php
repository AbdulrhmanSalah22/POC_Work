<?php

namespace App\Http\DTOs;

class ProductFormData
{
    public string $productName;
    public int $categoryId;

    public function __construct(string $productName, int $categoryId)
    {
        $this->productName = $productName;
        $this->categoryId = $categoryId;
    }
}
