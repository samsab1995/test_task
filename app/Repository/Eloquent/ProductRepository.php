<?php


namespace App\Repository\Eloquent;


use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository
{

    /**
     * ProductRepository constructor.
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function create(array $attributes): ?Model
    {
        return auth('api')->user()->products()->create($attributes);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        return auth('api')->user()->products()->paginate($perPage, $columns, $pageName, $page);
    }
}
