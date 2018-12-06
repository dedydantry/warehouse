<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Satuan;
use App\Http\Resources\SatuanResource;
use Illuminate\Support\Str;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::get();
        return SatuanResource::collection($satuan);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $satuan = new Satuan;
        $satuan->satuan_name = $request->get('name');
        $satuan->slug =  Str::slug($request->get('name'), '-');
        $satuan->save();
        if($satuan) return new SatuanResource($satuan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $satuan = Satuan::findOrFail($id);
        if($satuan) return new SatuanResource($satuan);
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
        $satuan = Satuan::findOrFail($id);
        $satuan->satuan_name = $request->get('name');
        $satuan->slug = Str::slug($request->get('name'), '-');
        
        if($satuan->save()) return new SatuanResource($satuan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Satuan::findOrFail($id);
        
        if($brand->delete()) return new SatuanResource($brand);
    }
}
