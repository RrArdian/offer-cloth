<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Brand::all();

        return Response::json(['error' => false, 'data' => ['brand' => $data, 'base_url' => url()]]);
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
        $data = Brand::with('products')->find($id);

        if ($data != '') {

            return Response::json(['error' => false, 'data' => ['brand' => $data, 'base_url' => url()]]);
        } else {

            return Response::json(['error' => true, 'message' => 'No data brand found']);            
        }
    }

    public function search(Request $request)
    {
        $data = Brand::with('products')->where('name', 'LIKE', '%'.$request->input('q').'%')->get();

        if ($data->count() > 0) {

            return Response::json(['error' => false, 'count' => $data->count(), 'data' => ['brand' => $data, 'base_url' => url()]]);
        } else {

            return Response::json(['error' => true, 'message' => 'No data brand found']);            
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
