<?php

namespace App\Http\Controllers\Api;

use App\Supplier;
use App\Http\Resources\SupplierResource;
use App\Http\Resources\SuppliersResource;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $suppliers = Supplier::all();
        return new SuppliersResource($suppliers);
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

        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->delivery_id = $request->delivery_id;
        $supplier->save();

        if($supplier->save()){

            return $jsondata = array("code"=>0,
            "msg"=>"Supplier created");
            
        }else{

            return $jsondata = array("code"=>1,
            "msg"=>"Error while saving");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return new SupplierResource($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->supplier_name;

        $supplier->save();

        if($supplier->save()){

            return $jsondata = array("code"=>0,
            "msg"=>"Supplier created");
            
        }else{

            return $jsondata = array("code"=>1,
            "msg"=>"Error while saving");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json(null, 204);
    }
}
