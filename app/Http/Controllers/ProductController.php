<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct product page
    public function productListPage(){
        $productList = Product::paginate(5);
        return view('admin.product.productList',compact('productList'));
    }
    //direct product create paage
    public function adminProductCreatePage(){
        $category = Category::get();
        return view('admin.product.createProduct',compact('category'));
    }
    //create product
    public function createProduct(Request $request){
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
        return redirect()->route('admin#productListPage');
    }

    //view detail page
    public function viewDetail($id){
        $product = Product::select('products.*','categories.name as category_name')
                            ->leftJoin('categories','products.category_id','categories.id')
                            ->where('products.id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        // dd($images->toArray());
        return view('admin.product.detail',compact('product','images'));
    }
    //delete category
    public function deleteProduct($id){
        $deleteImage = Image::where('product_id',$id)->get();
        $deleteImageArray = $deleteImage->toArray();
        for($i=0; $i<count($deleteImageArray);$i++){
            // dd($deleteImageArray[$i]['id']);
            $finalImageId = $deleteImageArray[$i]['product_id'];
        }
        // dd($id,$finalImageId);
        Product::where('id',$id)->delete();
        Image::where('product_id',$id)->delete();
        return back();
    }
    //direct update page
    public function updatePage($id){
        $category = Category::get();
        $product = Product::where('id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        // $image = Image::get();
        return view('admin.product.update',compact('category','product','images'));
    }
    //delete each photo
    public function deleteEachPhoto($id){
        // dd($id);
        $oldImage = Image::where('id',$id)->first();
        $oldImageName = $oldImage['image'];

            if($oldImage != null){
                Storage::delete('public/storage/productImages/'.$oldImageName);
                Image::where('id',$id)->delete();
            }
            return back();
    }
    //update product
    public function updateProduct(Request $request){
        $this->productValidationCheck($request,"update");
        $data = $this->getProductData($request);
        if($request->hasFile('image')){
            $oldImage = Product::where('id',$request->productId)->first();
            $oldDbImage = $oldImage['image'];
            // dd($oldDbImage);
            if($oldDbImage != null){
                Storage::delete('public/'.$oldDbImage);
            }
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/',$fileName);
            $data['image'] = $fileName;
        }


        if($request->hasFile('images')){
            $product = Product::where('id',$request->productId)->get();
            // dd($product);
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
        Product::where('id',$request->productId)->update($data);
        // Image::where('product_id',$request->productId)->update();
        return redirect()->route('admin#productListPage');

    }

    //direct sale page
    public function salePage(){
        $saleList = Product::where('option','sale')->get();
        // dd($saleList);
        return view('admin.home.sale',compact('saleList'));
    }
    //direct rent page
    public function rentPage(){
        $rentList = Product::where('option','rent')->get();
        return view('admin.home.rent',compact('rentList'));
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
