<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Barang;
use App\Http\Resources\BarangResource;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand = Barang::with(['categories', 'brands', 'satuans'])->orderBy('id', 'desc');

        if($request->get('all')) {
            $brand = $brand->get();
            return response()->json($brand);
        } else {
            $brand = $brand->paginate(1);
            return BarangResource::collection($brand);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            "category" => \App\Category::all(),
            "brand" => \App\Brand::all(),
            "satuan" => \App\Satuan::all()
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->part_number = $request->get('part_number');
        $barang->description = $request->get('description'); 
        $barang->category_id = $request->get('category_id'); 
        $barang->brand_id = $request->get('brand_id'); 
        $barang->satuan_id = $request->get('satuan_id');
        $barang->price = $request->get('price');
        $barang->cover = $request->get('cover');
        $barang->stok = $request->get('stok');
        $barang->save();
        if($barang) return new BarangResource($barang);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        if($barang) return new BarangResource($barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        if($barang) return new BarangResource($barang);

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
        $barang = Barang::findOrFail($id);
        $barang->part_number = $request->get('part_number');
        $barang->description = $request->get('description'); 
        $barang->category_id = $request->get('category_id'); 
        $barang->brand_id = $request->get('brand_id'); 
        $barang->satuan_id = $request->get('satuan_id');
        $barang->price = $request->get('price');
        $barang->cover = $request->get('cover');
        $barang->stok = $request->get('stok');
        
        if($barang->save()) return new BarangResource($barang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        
        if($barang->delete()) return new BarangResource($barang);
    }
}
