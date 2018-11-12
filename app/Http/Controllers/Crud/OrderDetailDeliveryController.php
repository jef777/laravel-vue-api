<?php

namespace App\Http\Controllers\Crud;

use App\Order_Detail_Delivery;
use Illuminate\Http\Request;

class OrderDetailDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return Order_Detail_Delivery::all();
      
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
        $order_delivery_detail = Order_Detail_Delivery::create($request->all());

        return response()->json($order_delivery_detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Detail_Delivery $order_delivery_detail)
    {
        return $order_delivery_detail;
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
    public function update(Request $request, Order_Detail_Delivery $order_delivery_detail)
    {
        $order_delivery_detail->update($request->all());

        return response()->json($order_delivery_detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Order_Detail_Delivery $order_delivery_detail)
    {
        $order_delivery_detail->delete();

        return response()->json(null, 204);
    }
}
