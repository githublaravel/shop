<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    //

    public function list(){
        $users = User::get();
        return view('admin/users/list',compact('users'));
    }

    public function insert(){
        return view('admin/users/insert');
    }

    public function save_insert(Request $request){

        $data = $request->all();

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'age' => 'required|numeric',
            'phonenumber' => 'required|numeric'
        ];

        $message = [
            'name.required' => 'نام را وارد کنید',
            'lastname.required' => 'فامیل را وارد کنید',
            'age.required' => 'سن را وارد کنید',
            'age.numeric' => 'سن را عدد وارد کنید',
            'phonenumber.required' => 'موبایل را وارد کنید',
            'phonenumber.numeric' => 'موبایل  را عدد وارد کنید'
        ];

        $valid = Validator::make($data,$rules,$message);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }


        $user = new User();

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->age = $request->age;
        $user->phonenumber = $request->phonenumber;

        $user->save();

        return redirect('/admin/users');

    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('admin/users/edit',compact('user'));
    }

    public function edit_save($id,Request $request){
        
        $user = User::where('id',$id)->first();

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->age = $request->age;
        $user->phonenumber = $request->phonenumber;

        $user->save();

        return redirect('/admin/users');
    }

    public function delete($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect('/admin/users');
    }
}
