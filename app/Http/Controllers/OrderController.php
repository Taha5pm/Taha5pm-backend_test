<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\customer;
use App\Models\product;
use App\Models\supplier_product;
use App\Models\item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::all();
        $products = product::all();
        $supp_prods = supplier_product::all();
        return view('Admin.make_order', ['customers' => $customers, 'products' => $products, 'supp_prods' => $supp_prods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new order();
        $item = new item();

        $c= $request->has('customer_name');
        if($c)
        {
            $customer_id=customer::all()->where('name','=',$request->customer_name)->value('customer_id');
            $order->customer_id = $customer_id;
            $order->save();
        }
        else{
        $order->customer_id = $request->customer_id;
        $order->save();
        }

        $order_id = $order::all()->last();
        $order_id = $order_id['order_id'];

        $q = $request->quantity;
        $newquan = supplier_product::all()->where('p_serial_number', 'equal', $request->p_serial_number)
            ->where('quantity', '>', 0);

        foreach ($newquan as $record) {
            if ($record->quantity >= $q) {
                $record->sold = $record->quantity;
                $record->quantity = $record->quantity - $q;
                $record->sold = $record->sold - $record->quantity;
                $record->save();

                $item->supplier_product_id = $record->supplier_product_id;
                $item->order_id = $order_id;
                $item->quantity = $request->quantity;
                $unit_price = product::all()->where('p_serial_number', 'equal', $request->p_serial_number);
                $unit_price = $unit_price->value('price');

                $item->total_price = strval(intval($request->quantity) * intval($unit_price));
                $item->save();
                break;
            } else {
                $record->sold = $record->quantity;
                $q = $q - $record->quantity;
                $record->quantity = 0;
                $record->save();
            }
        }

        $items = item::all();
        $customers = customer::all();
        $orders = order::all();
        $products = product::all();
        $supp_prods = supplier_product::all();
        if($c)
        {
        return redirect()->route('web_home', ['items' => $items, 'customers' => $customers, 'orders' => $orders, 'products' => $products, 'supp_prods' => $supp_prods]);
        }
        return redirect()->route('home', ['items' => $items, 'customers' => $customers, 'orders' => $orders, 'products' => $products, 'supp_prods' => $supp_prods]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
