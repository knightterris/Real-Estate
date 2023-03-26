<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //direct admin contact page
    public function contactPage(){
        $clientMessage = Contact::paginate(4);
        // dd($clientMessage->toArray());
        return view('admin.contact.commentsPage',compact('clientMessage'));
    }
    //contact user ->admin
    public function createMessage(Request $request){
        // dd($request->all());
        $this->messageValidationCheck($request);
        $messageData = $this->requestMessageData($request);
        // dd($messageData);
        Contact::create($messageData);
        return back()->with(['messageSent'=>'Thanks for your review. We will keep in touch with you and will make our service Better.']);
    }
    //direct read page
    public function readComment($id){
        $showMessage = Contact::where('id',$id)->get();
        // dd($showMessage->toArray());
        return view('admin.contact.readComment',compact('showMessage'));
    }
    //delete comment
    public function deleteComment($id){
        Contact::where('id',$id)->delete();
        return back();
    }
    //delete all comments
    public function deleteAllComment(){
        Contact::truncate();
        return back();
    }

    //private functions
    //message validation check
    private function messageValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ])->validate();
    }
    //request message data
    private function requestMessageData($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ];
    }
}
