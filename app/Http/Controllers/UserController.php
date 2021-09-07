<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    private UserRepository $userRepository;

    /**
     * UserController constructor.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth:admin');
        $this->userRepository = $userRepository;
    }

    public function index(): AnonymousResourceCollection
    {
        $users = $this->userRepository->paginate();
        return UserResource::collection($users);
    }

    public function destroy(User $user): JsonResponse
    {
        $status = $this->userRepository->delete($user->uuid);
        return response()->json([
            'status' => $status
        ]);
    }
}
