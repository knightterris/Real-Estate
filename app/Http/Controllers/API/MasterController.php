<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    // public function categoryList(){
    //     $categoryList = Category::get();
    //     // dd($categoryList);
    //     return response()->json($categoryList, 200);
    // }
    //get categories lists
    public function categoryList(){
        $categories = Category::get();
        return response()->json($categories, 200);
    }
}
