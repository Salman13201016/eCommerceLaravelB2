<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;
use App\Models\SubCatModel;
use App\Models\ProductModel;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = SubCatModel::join('categories', 'categories.id', '=', 'subcats.cat_id')
            ->select('subcats.*', 'categories.cat_name')
            ->get();
        // dd($all_data);
        return view('admin.product',["data"=> $all_data]);

    }

    public function subCatAjax($id)
    {
        $all_data = SubCatModel::join('categories', 'categories.id', '=', 'subcats.cat_id')
        ->select('subcats.*', 'categories.cat_name')->where('cat_id',$id)
        ->get();
        return response()->json($all_data);


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
        //
        $cat_id  = $request->input('cat_id');
        $sub_cat_id  = $request->input('sub_cat_id');
        $prod_name  = $request->input('prod_title');
        $prod_desc  = $request->input('prod_desc');
        $image_path = $request->file('prod_img')->store('public/images');
        $prod_weight  = $request->input('weight');
        $prod_price  = $request->input('price');
        var_dump($prod_weight);

        $product = new ProductModel();

        $product->cat_id = $cat_id;
        $product->sub_cat_id = $sub_cat_id;
        $product->prod_name = $prod_name;
        $product->prod_desc = $prod_desc;
        $product->prod_image = $image_path;
        $product->prod_weight = $prod_weight;
        $product->prod_price = $prod_price;
        $product->save();
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
    public function destroy($id)
    {
        //
    }
}
