<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($product_id, $image_id)
    {
        $products = Product::find($product_id);
        $images = Image::find($image_id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if (!$images) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $products->images()->syncWithoutDetaching($images);

        $products = Product::with('images')->find($product_id);

        return response()->json(['data' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $image_id)
    {
        $products = Product::find($product_id);
        $images = Image::find($image_id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if (!$images) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $products->images()->detach($images);

        $products = Product::with('images')->find($product_id);

        return response()->json(['data' => $products]);
    }
}
