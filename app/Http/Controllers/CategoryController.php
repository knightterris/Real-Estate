<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function categoryListPage(){
        $createdCategory = Category::paginate(6);
        return view('admin.category.list',compact('createdCategory'));
    }
    //direct category create page
    public function createCategoryPage(){
        return view('admin.category.create');
    }
    //create category
    public function createCategory(Request $request){
        $this->validationForCategory($request);
        $this->getCategoryData($request);
        $data = $this->getCategoryData($request);

        Category::create($data);
        return redirect()->route('admin#categoryListPage');
    }
    //delete all categories
    public function deleteAll(){
        Category::truncate();
        return back();
    }
    //delete category
    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'A category has been deleted.']);
    }
    //direct  editPage
    public function editPage($id){
        $data = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('data'));
    }
    //update category
    public function updateCategory(Request $request){
        $this->validationForCategory($request);
        $this->getUpdateCategoryData($request);
        $updateData = $this->getUpdateCategoryData($request);
        Category::where('id',$request->categoryId)->update($updateData);
        return redirect()->route('admin#categoryListPage')->with(['updateSuccess'=>'Category Updated Successfully.']);
    }

    //private functions
    //get category data
    private function validationForCategory($request){
        Validator::make($request->all(),[
            'categoryName'=>'required',
            'categoryDescription'=>'required'
        ])->validate();
    }
    private function getCategoryData($request){
        return[
            'name'=>$request->categoryName,
            'description'=>$request->categoryDescription
        ];
    }
    //get update category data
    private function getUpdateCategoryData($request){
        return[
            'name'=>$request->categoryName,
            'description'=>$request->categoryDescription
        ];
    }
}
