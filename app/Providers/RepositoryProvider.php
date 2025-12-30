<?php

namespace App\Providers;

use App\Repositories\Eloquents\DepartmentRepository;
use App\Repositories\Eloquents\EmployeeRepository;
use App\Repositories\Eloquents\SkillRepository;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\SkillRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(

            DepartmentRepositoryInterface::class,
            DepartmentRepository::class,

            SkillRepositoryInterface::class,
            SkillRepository::class,

            EmployeeRepositoryInterface::class,
            EmployeeRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
