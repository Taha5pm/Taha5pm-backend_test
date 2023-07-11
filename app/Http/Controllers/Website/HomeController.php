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
        $supp_prods=supplier_product::all();
        $products=product::all();
        return view('Frontend.index',['supp_prods' => $supp_prods,'products' => $products]);
    }

     /**
     * Show the application dashboard.
     *
     * @param int $p_serial_number
     */
    public function show($p_serial_number)
    {
        $product=product::where('p_serial_number','=',$p_serial_number)->get();

        $q_sum=supplier_product::all()->where('p_serial_number','=',$p_serial_number)->sum('quantity');
        return view('Frontend.prod_details',['product'=>$product,'q_sum' => $q_sum]);
    }
}

