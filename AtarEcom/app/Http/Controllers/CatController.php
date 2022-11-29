<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;

class CatController extends Controller
{
    //
    function show(){
        // echo "Cat Show";
        $cat_model = new CatModel();
        $all_data = $cat_model->get();
        return view('admin.cat',["data"=> $all_data]);
    }

    function insert(Request $req){
        $catName = $req->cat_name;
        $cat_model = new CatModel();
        $cat_model->cat_name = $catName;
        $cat_model->save();
      
        
        return redirect('catShow/');
    }

    function showEdit($id){
        $cat_model = new CatModel();
        $data = $cat_model->where('id',$id)->get();
        
      
        
        return view('admin.cat_edit',["data"=>$data]);
    }

    function update(Request $req){
        $catName = $req->cat_name;
        $catId = $req->cat_id;
        $cat_model = CatModel::find($catId);
        $cat_model->cat_name = $catName;
        $cat_model->save();
      
        
        return redirect('catShow/');
    }

    function delete($id){
        $cat_model = new CatModel();
        $cat_model->where('id',$id)->delete();
        return redirect('catShow/');
    }

}
