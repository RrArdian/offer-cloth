<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Product::with('brands', 'categories', 'photos', 'sizes')->get();

        return Response::json(['error' => false, 'data' => ['products' => $data, 'base_url' => url()]]);
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
        $data = Product::with('brands', 'categories', 'photos', 'sizes')->find($id);

        if ($data != '') {

            return Response::json(['error' => false, 'data' => ['products' => $data, 'base_url' => url()]]);
        } else {

            return Response::json(['error' => true, 'message' => 'No data product found']);            
        }
    }

    public function search(Request $request)
    {
        $data = Product::with('brands', 'categories', 'photos', 'sizes')->where('name', 'LIKE', '%'.$request->input('q').'%')->get();

        if ($data->count() > 0) {

            return Response::json(['error' => false, 'count' => $data->count() ,'data' => ['products' => $data, 'base_url' => url()]]);
        } else {

            return Response::json(['error' => true, 'message' => 'No data product found']);
        }
    }

    public function filter(Request $request)
    {
        if ($request->input('brand') && $request->input('category') && $request->input('price') != '') {

            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereBrand_id($request->input('brand'))
                ->whereCategory_id($request->input('category'))
                ->whereBetween('price_discount', explode('-', $request->input('price')))
                ->get();

        } elseif ($request->input('brand') && $request->input('category') != '') {
            
            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereBrand_id($request->input('brand'))
                ->whereCategory_id($request->input('category'))
                ->get();

        } elseif ($request->input('brand') && $request->input('price') != '') {

            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereBrand_id($request->input('brand'))
                ->whereBetween('price_discount', explode('-', $request->input('price')))
                ->get();

        } elseif ($request->input('category') && $request->input('price') != '') {

            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereCategory_id($request->input('category'))
                ->whereBetween('price_discount', explode('-', $request->input('price')))
                ->get();

        } elseif ($request->input('brand') != '') {

            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereBrand_id($request->input('brand'))
                ->get();

        } elseif ($request->input('category') != '') {

            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereCategory_id($request->input('category'))
                ->get();

        } elseif ($request->input('price') != '') {

            $data = Product::with('brands', 'categories', 'photos', 'sizes')
                ->whereBetween('price_discount', explode('-', $request->input('price')))
                ->get();

        }

        if ($data->count() > 0) {

            return Response::json(['error' => false, 'count' => $data->count() ,'data' => ['products' => $data, 'base_url' => url()]]);
        } else {

            return Response::json(['error' => true, 'message' => 'No data product found']);
        }
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
        //
    }
}
