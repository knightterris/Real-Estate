<?php

namespace App\Http\Controllers\User;

use Storage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //direct user home page
    public function homePage(){
        return view('user.home.homePage');
    }
    //direct about page
    public function aboutPage(){
        return view('user.home.about');
    }
    //direct contact page
    public function contactPage(){
        return view('user.home.contact');
    }
    //direct account page
    public function accountPage(){
        return view('user.account.accountPage');
    }
    //direct edit accountPage
    public function editAccountPage(){
        return view('user.account.editPage');
    }
    //change password page
    public function passwordPage(){
        return view('user.account.changePassword');
    }
    //update profile
    public function updateUserAccount($id,Request $request){
        $this->profileValidationCheck($request);
        $userUpdateData = $this->getUpdateUserData($request);
        if($request->hasFile('image')){
            $userInfo = User::where('id',$id)->first();
            $userOldPic = $userInfo->image;

            if($userOldPic != null){
                Storage::delete(['public', $userOldPic]);
                Storage::delete('public/storage', $userOldPic);
            }

            // if(File::exists(public_path().'/storage/'.$userOldPic)){
            //     File::delete(public_path().'/storage/'.$userOldPic);
            // }

            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $userUpdateData['image']=$fileName;
        }
        User::where('id',$id)->update($userUpdateData);
        return redirect()->route('user#accountPage')->with(['updateSuccess'=>'Account has updated successfully.']);
    }
    //update password
    public function changeUserPassword(Request $request){
        // $this->passwordValidationCheck($request);
        $userId = Auth::user()->id;
        $userPassword = User::select('password')->where('id',$userId)->first();
        $userDbPassword = $userPassword->password;


        if(Hash::check($request->oldPassword, $userDbPassword)){
            $newUserPassword = ['password'=>Hash::make($request->newPassword)];
            User::where('id',Auth::user()->id)->update($newUserPassword);
            return redirect()->route('user#accountPage')->with(['updateSuccess'=>'Password has updated successfully.']);
            // Auth::logout();
            // return redirect()->route('auth#loginPage')->with(['pwChanged'=>'Password has changed.']);

        }
        return back()->with(['notMatch'=>'The Old Password Do not Match With Our Records!! Please Try Agani!!']);
    }
    //private functions
    //profile validation check
    private function profileValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'image'=>'mimes:png,jpg,jpeg,png,webp|file'
        ])->validate();
    }
    //get update user data
    private function getUpdateUserData($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'updated_at'=>Carbon::now()
        ];
    }
    //password validatioin check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required',
            'newPassword'=>'required|min:8|max:15',
            'confirmPassword'=>'required|min:8|max:15|same:newPassword'
        ])->validate();
    }
}
