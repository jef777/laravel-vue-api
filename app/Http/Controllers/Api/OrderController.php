<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrdersResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the ORDER resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orders = Order::all();
        return new OrdersResource($orders);
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

        

        $order = new Order();
        $order->order_date = $request->order_date;
        $order->headquater_id = $request->headquater_id;
        $order->save();

        if($order->save()){

            return $jsondata = array("code"=>0,
            "msg"=>"Order created");
            
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
    public function show(Order $order)
    {
        return new OrderResource($order);
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
    
        $order = Order::find($id);
        $order->order_date = $request->order_date;
        $order->headquater_id = $request->headquater_id;
        $order->save();

        if($order->save()){

            return $jsondata = array("code"=>0,
            "msg"=>"Order Updated");
            
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
        $order = Order::find($id);
        $order->delete();

        return response()->json(null, 204);
    }
}
