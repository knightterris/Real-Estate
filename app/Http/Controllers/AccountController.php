<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //direct admin account page
    public function accountPage(){
        return view('admin.account.accountPage');
    }
    //direct edit account page
    public function editPage(){
        return view('admin.account.edit');
    }
    //direct admin list page
    public function adminListPage(){
        $adminList = User::when(request('key'),function($query){
                        $query->orWhere('name','like','%'.request('key').'%')
                            ->orWhere('email','like','%'.request('key').'%')
                            ->orWhere('gender','like','%'.request('key').'%')
                            ->orWhere('address','like','%'.request('key').'%');
        })
                            ->where('role','admin')->paginate(3);
        return view('admin.list.adminList',compact('adminList'));
    }
    //direct user list page
    public function userListPage(){
        $userList = User::when(request('key'),function($query){
                        $query->orWhere('name','like','%'.request('key').'%')
                            ->orWhere('email','like','%'.request('key').'%')
                            ->orWhere('gender','like','%'.request('key').'%')
                            ->orWhere('address','like','%'.request('key').'%');
        })
                        ->where('role','user')->paginate(3);
        return view('admin.list.userList',compact('userList'));
    }
    //direct update credential page
    public function updateCredentialPage(){
        return view('admin.account.update');
    }
    //update password
    public function updatePassword(Request $request){
        // $this->passwordValidationCheck($request);
        $userId = Auth::user()->id;
        $userPassword = User::select('password')->where('id',$userId)->first();
        $userDbPassword = $userPassword->password;


        if(Hash::check($request->oldPassword, $userDbPassword)){
            $newUserPassword = ['password'=>Hash::make($request->newPassword)];
            User::where('id',Auth::user()->id)->update($newUserPassword);
            Auth::logout();
            return redirect()->route('auth#loginPage')->with(['pwChanged'=>'Password has changed.']);

        }
        return back()->with(['notMatch'=>'The Old Password Do not Match With Our Records!! Please Try Agani!!']);
    }
    //update profile
    public function updateProfile($id,Request $request){
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
        return redirect()->route('admin#accountPage')->with(['updateSuccess'=>'Account has updated successfully.']);
    }
    //direct admin create page
    public function createAdminPage(){
        return view('admin.list.createAdmin');
    }
    //create admin
    public function createAdmin(Request $request){
        $this->createNewAdminValidation($request);
        $adminData = $this->getAdminData($request);
        User::create($adminData);
        return redirect()->route('admin#adminListPage')->with(['createSuccess'=>'Admin Created.']);
    }
    //direct user detail page
    public function accountDetail($id){
        $userData = User::where('id',$id)->first();
        return view('admin.list.userDetail',compact('userData'));
    }
    //delete user
    public function deleteUser($id){
        User::where('id',$id)->delete();
        return back();
    }

    //private functions
    //password validatioin check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required',
            'newPassword'=>'required|min:8|max:15',
            'confirmPassword'=>'required|min:8|max:15|same:newPassword'
        ])->validate();
    }
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
    //createNewAdminValidation
    private function createNewAdminValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'password'=>'required|min:8|max:15',

            'gender'=>'required',
            'role'=>'required'
        ])->validate();
    }
    //get admin data
    private function getAdminData($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'gender'=>$request->gender,
            'role'=>$request->role
        ];
    }
}
