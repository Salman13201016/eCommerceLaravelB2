<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CatModel;

class TestCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat_model = new CatModel();
        $all_data = $cat_model->get();
        return view('admin.testCat',["data"=> $all_data]);
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
    public function store(Request $req)
    {
        //
        $catName = $req->cat_name;
        $cat_model = new CatModel();
        $cat_model->cat_name = $catName;
        $cat_model->save();
        return redirect('testCat/');
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
        $cat_model = new CatModel();
        $data = $cat_model->where('id',$id)->get();
        
      
        
        return view('admin.editTestCat',["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $catName = $req->cat_name;
        $catId = $req->cat_id;
        $cat_model = CatModel::find($catId);
        $cat_model->cat_name = $catName;
        $cat_model->save();
        return redirect('testCat/');
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
        
        $cat_model = new CatModel();
        $cat_model->where('id',$id)->delete();
        return redirect('testCat/');
    }
}
