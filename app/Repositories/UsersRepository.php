<?php

namespace App\Repositories;

use App\{Models\TaskModel, Models\UserModel};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\Pure;

readonly class UsersRepository
{
    /**
     * UserRepository constructor.
     * @param UserModel $userModel
     */
    #[Pure]
    public function __construct(private UserModel $userModel)
    {
    }

    /**
     * @return Collection
     */
    public function getTop10UsersWithTasks(): Collection
    {
        return TaskModel::select('assigned_to_id', DB::raw(value: 'count(*) as total'))
            ->with('getUser')
            ->groupBy('assigned_to_id')
            ->orderByDesc('total')
            ->take(10)
            ->get();
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function searchForUsersByName(string $name): mixed
    {
        return $this->userModel::select(columns: ['id', 'name'])->where(column: 'name', operator: 'like', value: "%$name%")->take(value: 100)->get();
    }
}
