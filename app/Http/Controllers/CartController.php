<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Cart;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $data = array(
        //         'id'        => 2, 
        //         'name'      => 'Tas Taslan Neo', 
        //         'qty'       => 2, 
        //         'price'     => '240000', 
        //         'options'   => array('size' => '9'));

        // Cart::add($data);

        return Response::json(['error' => false, 'data' => [ 'cart' => Cart::content(), 'items_count' => Cart::count(), 'items_type' => Cart::count(false), 'total' => Cart::total()]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }

    public function emptycart()
    {
        Cart::destroy();

        return Response::json(['error' => false, 'message' => 'Cart is now empty.']);
    }
}
