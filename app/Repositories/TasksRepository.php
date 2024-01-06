<?php

namespace App\Repositories;

use App\Models\TaskModel;
use JetBrains\PhpStorm\Pure;

readonly class TasksRepository
{
    /**
     * TaskRepository constructor.
     * @param TaskModel $taskModel
     */
    #[Pure]
    public function __construct(private TaskModel $taskModel)
    {
    }

    /**
     * @param int $perPage
     * @return array
     */
    public function index(int $perPage = 6): array
    {
        return [$this->taskModel::paginate($perPage, ['*'], 'draw'), $this->taskModel->count()];
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->taskModel::create($data);
    }
}
