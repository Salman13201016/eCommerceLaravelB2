<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;
use App\Models\SubCatModel;

class FrontController extends Controller
{
    //
    function homepage(){
        $subcats = SubCatModel::with(['catSubcat'])->get()->groupBy('cat_id');
        // dd($subcats);
        return view('home',["data"=>$subcats]);
    }
}
