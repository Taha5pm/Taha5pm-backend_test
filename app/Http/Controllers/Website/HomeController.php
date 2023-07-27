<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\supplier_product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $products = product::all();
        return view('Frontend.index', ['products' => $products]);
    }

    /**
     * Show the application dashboard.
     *
     * @param int $p_serial_number
     */
    public function show($p_serial_number)
    {
        $product = product::where('p_serial_number', '=', $p_serial_number)->get();

        return view('Frontend.prod_details', ['product' => $product]);
    }
}
