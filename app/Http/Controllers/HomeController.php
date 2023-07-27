<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\customer;
use App\Models\product;
use App\Models\order;
use App\Models\supplier_product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all()->where('role', 'customer');
        $orders = order::all();
        $products = product::all();
        return view('admin.dashboard', ['users' => $users, 'orders' => $orders, 'products' => $products]);
    }
}
