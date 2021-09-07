<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private UserRepository $userRepository;

    /**
     * AuthController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth:api')->except(['login', 'register']);
        $this->userRepository = $userRepository;
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $user = $this->userRepository->create($request->validated());
        $token = auth('api')->tokenById($user->id);

        return $this->respondWithToken($token);

    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function delete(): JsonResponse
    {
        $status = auth('api')->user()->delete();
        return response()->json([
            'status' => $status
        ]);
    }
}
