<?php

namespace App\Http\Controllers;

use App\Http\Actions\CreateProductAction;
use App\Http\DTOs\ProductData;
use App\Http\DTOs\ProductFormData;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('category:id,name')->whereProductLike('Test')->get();
        return $products;

        $result = QueryBuilder::for(Product::class)->allowedFilters([AllowedFilter::exact('id'),
            AllowedFilter::scope('started_at')])
            ->allowedFields('category.id')
            ->allowedSorts('name')
            ->allowedIncludes('category')
            ->get();

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(CreateProductRequest $request)
    {
        $data = (new ProductFormData($request->name, $request->category_id));
         (new CreateProductAction($data))->execute();

         return 'Product Created From The Action Successfully' ;

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        return $this->productRepository->findById($productId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
//        $product->delete();
//        return "Deleted Successfully";
        $this->productRepository->delete($productId);
    }
}
