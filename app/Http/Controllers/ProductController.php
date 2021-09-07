<?php

namespace App\Http\Controllers;

use App\Events\ProductCreatedEvent;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repository\Eloquent\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    /**
     * ProductController constructor.
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth:api');
        $this->productRepository = $productRepository;
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(): AnonymousResourceCollection
    {
        $products = $this->productRepository->paginate();
        return ProductResource::collection($products);
    }

    public function store(StoreProductRequest $request): ProductResource
    {
        $product = $this->productRepository->create($request->validated());
        ProductCreatedEvent::dispatch($product);
        return new ProductResource($product);

    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function update(Product $product, UpdateProductRequest $request): JsonResponse
    {
        $status = $this->productRepository->update($product->uuid, $request->validated());
        return $this->updateOrDeleteResponse($status);
    }

    public function destroy(Product $product): JsonResponse
    {
        $status = $this->productRepository->delete($product->uuid);
        return $this->updateOrDeleteResponse($status);
    }

    private function updateOrDeleteResponse($status): JsonResponse
    {
        return response()->json([
            'status' => $status
        ]);
    }
}
