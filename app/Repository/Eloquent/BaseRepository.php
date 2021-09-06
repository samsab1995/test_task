<?php


namespace App\Repository\Eloquent;


use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Collection
    {
        return $this->model->create($attributes);
    }

    public function findById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function update(array $attributes)
    {
        return $this->model->update($attributes);
    }

    public function delete($id)
    {
        return $this->delete($id);
    }
}
