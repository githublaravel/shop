<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Models\Category;
 
use Validator;

class CategoryController extends Controller
{
    //

    public function list(){

        $cats = Category::get();
        return view('admin/categories/list',compact('cats'));

    }

    public function list_mode_user(){
        $cats = Category::get();
        return view('categories',compact('cats'));
    }

    public function insert(){

        return view('admin/categories/insert');

    }

    public function save_insert(Request $request){

        $data = $request->all();

        $rules = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'نام را وارد کنید'
        ];

        $valid = Validator::make($data,$rules,$message);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        $cats =new Category();
        $cats->name=$request->name;
        $cats->save();
        return redirect('/admin/categories');
    }

    public function edit($id){
        $cat = Category::where('id',$id)->first();
        return view('admin/categories/edit',compact('cat'));
    
    }

    public function save_edit($id,Request $request){

        $data = $request->all();

        $rules = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'نام را وارد کنید'
        ];

        $valid = Validator::make($data,$rules,$message);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        $cat = Category::where('id',$id)->first();
            $cat->name=request('name');
            $cat->save();
            return redirect('/admin/categories');
    }

    public function delete($id){
        $cat=Category::where('id',"=",$id)->first();
            $cat->delete();
            return redirect('/admin/categories');
    }
}

