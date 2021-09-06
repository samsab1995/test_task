<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    public function create(array $attributes): Collection;

    public function findById($id): ?Model;

    public function update(array $attributes);

    public function delete($id);
}
