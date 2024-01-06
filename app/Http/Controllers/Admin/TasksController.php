<?php

namespace App\Http\Controllers\Admin;

use App\{Http\Requests\Admin\Tasks\StoreRequest, Http\Resources\TasksResource, Repositories\TasksRepository,};
use Illuminate\{Contracts\Foundation\Application,
    Contracts\View\Factory,
    Contracts\View\View,
    Http\JsonResponse,
    Http\RedirectResponse};

readonly class TasksController
{
    /**
     * @param TasksRepository $tasksRepository
     */
    public function __construct(private TasksRepository $tasksRepository) { }

    /**
     * Display a listing of the resource.
     *
     */
    public function indexData(): JsonResponse
    {
        [$data, $totalRecords] = $this->tasksRepository->index(perPage: 10);
        return response()->json([
            'raw' => 1,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => 10,
            'data' => TasksResource::collection(resource: $data)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view(view: 'admin.modules.tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view(view: 'admin.modules.tasks.store');
    }

    /**
     * @param StoreRequest $storeRequest
     * @return RedirectResponse
     */
    public function store(StoreRequest $storeRequest): RedirectResponse
    {
        $model = $this->tasksRepository->store(data: $storeRequest->validated());
        return redirect()
            ->route(route: 'admin.task.index')
            ->with(key: 'data', value: $model)
            ->with(key: 'alert', value: ['type' => 'success', 'html' => 'Tasks Added successfully']);

    }
}
