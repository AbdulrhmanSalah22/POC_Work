<?php

namespace App\Http\Actions;

use App\Http\DTOs\ProductData;
use App\Http\DTOs\ProductFormData;
use App\Models\Product;

class CreateProductAction
{
    protected ProductFormData $data;
    public function __construct(ProductFormData $data)
    {
        $this->data = $data ;
    }

    public function execute() :ProductData
    {
       $product =  Product::create([
            'name' => $this->data->productName ,
            'category_id' => $this->data->categoryId
        ]);
       return (new ProductData($product->id ,$product->name, $product->category_id));
    }
}
