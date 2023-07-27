<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class GetInfo extends Controller
{
    public function getCustomers()
    {
        return response()->json([customer::all()->where('role', 'customer')]);
    }
    public function getOrders()
    {
        return response()->json([order::all()]);
    }
    public function getProducts()
    {
        return response()->json([product::all()]);
    }
}
