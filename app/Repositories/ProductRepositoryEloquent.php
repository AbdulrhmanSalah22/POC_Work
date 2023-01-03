<?php

namespace App\Repositories;

use App\Models\Product;
use Prettus\Repository\Eloquent\BaseRepository;



/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
//    public function boot()
//    {
//        $this->pushCriteria(app(RequestCriteria::class));
//    }

    public function findById($productId)
    {
        return Product::with('category')->findOrFail($productId);
    }

    public function delete($productId)
    {
        Product::findOrFail($productId)->delete();
        return 'Product Deleted Successfully';
    }
}
