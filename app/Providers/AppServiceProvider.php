<?php

namespace App\Providers;

use App\Models\Department;
use App\Services\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Single source of truth for site-wide navigation data.
        // Every view (including anonymous Blade components like the
        // header, subheader, and hero banner) receives this collection
        // automatically, so none of them need to query the database
        // themselves.
        View::composer('*', function ($view) {
            $navDepartments = Department::with('mainCategories.subcategories')
                ->orderBy('sort_order')
                ->get();

            $view->with('navDepartments', $navDepartments);
            $view->with('cartCount', app(Cart::class)->count());
        });
    }
}
