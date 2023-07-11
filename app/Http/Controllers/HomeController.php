<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\customer;
use App\Models\product;
use App\Models\order;
use App\Models\supplier_product;
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
        $items=item::all();
        $customers=customer::all();
        $orders=order::all();
        $products=product::all();
        $supp_prods=supplier_product::all();
        $supplier_total_price=item::where('supplier_product_id','=',supplier_product::where('s_serial_number','=',Auth::user()->s_serial_number)->value('supplier_product_id'))->sum('total_price');
        $supplier_total_quantity=supplier_product::all()->where('s_serial_number','=',Auth::user()->s_serial_number)->sum('sold');

        return view('admin.dashboard',['supp_prods' => $supp_prods,'items' =>$items,'customers'=>$customers,'orders'=>$orders,'products'=>$products,'supplier_total_price' => $supplier_total_price,'supplier_total_quantity' => $supplier_total_quantity]);
    }
}
