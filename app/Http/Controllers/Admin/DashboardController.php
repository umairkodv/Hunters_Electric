<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Subcategory;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'departmentCount' => Department::count(),
            'mainCategoryCount' => MainCategory::count(),
            'subcategoryCount' => Subcategory::count(),
            'productCount' => Product::count(),
        ]);
    }
}
