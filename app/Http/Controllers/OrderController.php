<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\customer;
use App\Models\product;
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
        return view('pages.typography', ['customers' => $customers, 'products' => $products]);
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

        $order->customer_id = $request->customer_id;
        $order->order_date = date('Y-m-d H:i:s');
        $order->save();

        $order_id = $order::all()->last();
        $order_id = $order_id['id'];

        $item->product_id = $request->product_id;
        $item->order_id = $order_id;
        $item->quantity = $request->quantity;

        $unit_price = product::all()->where('id', 'equal', $request->product_id);
        $unit_price = $unit_price->value('price');

        $item->total_price = strval(intval($request->quantity) * intval($unit_price));

        $newquan = product::find($request->product_id);
        if ($newquan) {
            if (intval($newquan->quantity) >= intval($request->quantity)) {
                $newquan->quantity = strval(intval($newquan->quantity) - intval($request->quantity));
                $newquan->save();
                $item->save();
            }
        }

        return redirect()->route('order');
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
