<?php

namespace App\Providers;

use App\Models\Department;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Queries relational database and loads all relationships simultaneously via eager loading (with)
        View::composer('*', function ($view) {
            $globalMenuData = Department::with('mainCategories.subcategories')
                ->orderBy('sort_order')
                ->get();

            $view->with('globalMenuData', $globalMenuData);
        });
    }
}
