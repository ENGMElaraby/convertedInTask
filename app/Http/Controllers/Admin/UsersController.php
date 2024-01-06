<?php

namespace App\Http\Controllers\Admin;

use App\{Http\Controllers\Controller, Repositories\UsersRepository};
use Illuminate\{Http\JsonResponse, Http\Request};
use JetBrains\PhpStorm\Pure;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     * @param UsersRepository $userRepository
     */
    #[Pure]
    public function __construct(private readonly UsersRepository $userRepository)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function searchForUsers(Request $request): JsonResponse
    {
        return response()->json(data: ['data' => $this->userRepository->searchForUsersByName(name: $request->input)]);
    }


}
