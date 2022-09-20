<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = supplier::all();
        $products = product::all();
        return view('profile.product', ['suppliers' => $suppliers, 'products' => $products]);
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
        $validation = $request->validate([
            'supplier_id'     => 'required',
            'model'           => 'required',
            'quantity'        => 'required',
            'price'           => 'required',
        ]);
        $check = product::select('id')->where(['supplier_id', 'equal', $request->supplier_id], ['model', 'like', '%' . $request->model . '%']);
        if ($check != null) {
            $new = product::find($check);
            if ($new) {
                $new->quantity = strval(intval($new->quantity) + intval($request->quantity));
                $new->save();
            }
        } else {
            $product = new product();
            $product->supplier_id = $request->supplier_id;
            $product->model = $request->model;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->save();
        }


        $products = product::all();
        $suppliers = supplier::all();

        return redirect()->route('profile.product', ['suppliers' => $suppliers, 'products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
