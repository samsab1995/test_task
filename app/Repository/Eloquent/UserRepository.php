<?php


namespace App\Repository\Eloquent;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{


    /**
     * UserRepository constructor.
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes): ?User
    {
        $attributes['password'] = Hash::make($attributes['password']);
        return parent::create($attributes);
    }
}
