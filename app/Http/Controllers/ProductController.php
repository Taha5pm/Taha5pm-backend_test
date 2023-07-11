<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\supplier;
use App\Models\supplier_product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

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
        $supp_prod =supplier_product::all();
        return view('Admin.product', ['suppliers' => $suppliers, 'products' => $products,'supp_prods'=>$supp_prod]);
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
            's_serial_number'     => 'required',
            'p_serial_number'     => 'required',
            'name'                => 'required',
            'description'         => 'required',
            'model'               => 'required',
            'quantity'            => 'required',
            'price'               => 'required',
        ]);

            $check=product::all()->where('p_serial_number', 'equal', $request->p_serial_number);
            $id = $check->map(function ($check)
            {
            return $check->only(['p_serial_number']);
            });

            $c=$id->value('p_serial_number');
            if($c == null)
            {
            $product = new product();
            $product->p_serial_number=$request->p_serial_number;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->model = $request->model;
            $product->price = $request->price;
            $product->save();

            $supp_prod=new supplier_product();
            $supp_prod->s_serial_number=$request->s_serial_number;
            $supp_prod->p_serial_number=$request->p_serial_number;
            $supp_prod->quantity=$request->quantity;
            $supp_prod->save();
            }
            else{
            $supp_prod=new supplier_product();
            $supp_prod->s_serial_number=$request->s_serial_number;
            $supp_prod->p_serial_number=$request->p_serial_number;
            $supp_prod->quantity=$request->quantity;
            $supp_prod->save();
            }


        $products = product::all();
        $suppliers = supplier::all();
        $supp_prod =supplier_product::all();

        return redirect()->route('admin.product', ['suppliers' => $suppliers, 'products' => $products,'supp_prods'=>$supp_prod]);
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
