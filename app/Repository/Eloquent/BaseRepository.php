<?php


namespace App\Repository\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseRepository
{
    protected Model $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): ?Model
    {
        return $this->model->create($attributes);
    }

    public function findById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function update($uuid, array $attributes): bool
    {
        return $this->model->newQuery()->where('uuid', $uuid)->update($attributes);
    }

    public function delete($uuid): bool
    {
        return $this->model->newQuery()->where('uuid', $uuid)->delete();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        return $this->model->paginate($perPage, $columns, $pageName, $page);
    }


}
