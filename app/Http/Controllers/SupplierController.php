<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\product;
use App\Models\supplier_product;
use Illuminate\Contracts\Auth\SupportsBasicAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = supplier::all();
        return view('Admin.supplier', ['suppliers' => $suppliers]);
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
            'name'          => 'required',
            'speciality'    => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'phonenumber'   => 'required',
        ]);
        $supplier = new supplier();
        $supplier->name = $request->name;
        $supplier->speciality = $request->speciality;
        $supplier->email = $request->email;
        $supplier->password = Hash::make($request->password);
        $supplier->phonenumber = $request->phonenumber;
        $supplier->role=$request->role;
        $supplier->save();

        $suppliers = supplier::all();
        return redirect()->route('admin.supplier', ['suppliers' => $suppliers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @param int $s_serial_number
     * @return \Illuminate\Http\Response
     */
    public function show($s_serial_number)
    {
        $supp = supplier::where('s_serial_number', '=', $s_serial_number)->get();
        $products = product::all();
        $supp_prods = supplier_product::where('s_serial_number', '=', $s_serial_number)->get();

        return view('Admin.supplier_details', ['supp' => $supp, 'products' => $products, 'supp_prods' => $supp_prods]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
