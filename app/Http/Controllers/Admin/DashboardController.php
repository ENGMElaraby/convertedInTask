<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UsersRepository;
use Illuminate\{Contracts\Foundation\Application, Contracts\View\Factory, Contracts\View\View};

readonly class DashboardController
{
    /**
     * @param UsersRepository $usersRepository
     */
    public function __construct(private UsersRepository $usersRepository) { }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $users = $this->usersRepository->getTop10UsersWithTasks();
        return view(view: 'admin.dashboard', data: compact(var_name: 'users'));
    }

}
