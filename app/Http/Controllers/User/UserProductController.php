<?php

namespace App\Http\Controllers\User;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserProductController extends Controller
{
    //direct property page
    public function productPage(){
        $product = Product::when(request('key'),function($query){
                        $query->orWhere('name','like','%'.request('key').'%')
                            ->orWhere('phone','like','%'.request('key').'%')
                            ->orWhere('address','like','%'.request('key').'%')
                            ->orWhere('price','like','%'.request('key').'%')
                            ->orWhere('title','like','%'.request('key').'%')
                            ->orWhere('description','like','%'.request('key').'%');
        })
                            ->get();
        return view('user.product.productPage',compact('product'));
    }
    //direct create page
    public function userProductCreatePage(){
        $category = Category::get();
        return view('user.product.create',compact('category'));
    }
    //create product
    public function userCreateProduct(Request $request){
        $this->productValidationCheck($request,"create");
       $data =  $this->getProductData($request);
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$fileName);
        $data['image']=$fileName;
        // dd($data);
        Product::create($data);

        if($request->hasFile('images')){
            $product = Product::get();
            $productArray = $product->toArray();
            for($i=0;$i<count($productArray);$i++){
                // dd($productArray[$i]['id']);
                $finalId = $productArray[$i]['id'];
            }

            foreach($request->file('images') as $item){
                $imgName = uniqid().$item->getClientOriginalName();
                $item->storeAs('public/productImages/',$imgName);
                $image = new Image();
                $image->image = $imgName;
                $image->product_id = $finalId;
                $image->save();
            }
        }
        return redirect()->route('user#productPage');
    }
    //direct detail page
    public function detailPage($id){
        $product = Product::select('products.*','categories.name as category_name')
                            ->leftJoin('categories','products.category_id','categories.id')
                            ->where('products.id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        return view('user.product.detail',compact('product','images'));
    }

    //private functions
    //product validation check
    private function productValidationCheck($request,$action){
        $productValidation = [
            'ownerName' => 'required',
            'title' => 'required',
            'category' => 'required',
            'phone' => 'required',
            'address' =>'required',
            'price'=>'required',
            'description'=>'required',
            'option'=>'required'
        ];

        $productValidation['image'] = $action == "create" ? 'required|mimes:png,jpg,jpeg,webp|file' : 'mimes:png,jpg,jpeg,webp|file';
        // $productValidation['images.*'] = $action == "create" ? 'required|mimes:png,jpg,jpeg,webp|file' : 'mimes:png,jpg,jpeg,webp|file';
        // dd($validationRules);
        Validator::make($request->all(),$productValidation)->validate();
    }
    //get product data
    private function getProductData($request){
        return[
            'name'=>$request->ownerName,
            'title'=>$request->title,
            'category_id'=>$request->category,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'price'=>$request->price,
            'description'=>$request->description,
            'option'=>$request->option
        ];
    }
}
