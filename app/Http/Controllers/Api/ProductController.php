<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsResource;
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
        
        $products = Product::all();
        return new ProductsResource($products);
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




        $product = new Product();
        $product->product_name = $request->product_name;
        $product->supplier_id = $request->supplier_id;
        $product->save();

        if($product->save()){

            return $jsondata = array("code"=>0,
            "msg"=>"product created");
            
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
    public function show(Product $product)
    {
        return new ProductResource($product);
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
        // $product->update($request->only(['product_name']));
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->supplier_id = $request->supplier_id;
        $product->save();

        if($product->save()){

            return $jsondata = array("code"=>0,
            "msg"=>"post Updated");
            
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
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
