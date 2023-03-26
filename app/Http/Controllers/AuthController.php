<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     //distinguish admin and user
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('auth#homePage');
        }else{
            return redirect()->route('user#homePage');
        }


    }
    //direct homepage
   // direct admin home page
    public function homePage(){
        $product = Product::when(request('key'),function($query){
                        $query->orWhere('name','like','%'.request('key').'%')
                            ->orWhere('phone','like','%'.request('key').'%')
                            ->orWhere('address','like','%'.request('key').'%')
                            ->orWhere('price','like','%'.request('key').'%')
                            ->orWhere('title','like','%'.request('key').'%')
                            ->orWhere('description','like','%'.request('key').'%');
        })
                        ->get();
        return view('admin.home.homePage',compact('product'));
    }
    //direct login page
    public function loginPage(){
        return view('login');
    }
    //direct register page
    public function registerPage(){
        return view('register');
    }
}
