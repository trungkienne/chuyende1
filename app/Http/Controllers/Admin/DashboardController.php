<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        
        // Tính doanh thu từ order_details (với error handling)
        $revenue = 0;
        try {
            $revenue = OrderDetail::selectRaw('SUM(quantity * price) as total')->value('total') ?? 0;
        } catch (\Exception $e) {
            $revenue = 0;
        }

        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalUsers' => $totalUsers,
            'totalCategories' => $totalCategories,
            'totalBlogs' => $totalBlogs,
            'revenue' => $revenue,
        ]);
    }
}
