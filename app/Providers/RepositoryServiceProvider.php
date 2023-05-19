<?php

namespace App\Providers;

use App\Http\Interfaces\EmployeeRepositoryInterface;
use App\Http\Interfaces\VacationRequestApproversRepositoryInterface;
use App\Http\Repositories\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : void 
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(VacationRequestRepositoryInterface::class, VacationRequestRepository::class);
        $this->app->bind(VacationRequestApproversRepositoryInterface::class, VacationRequestApproversRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
