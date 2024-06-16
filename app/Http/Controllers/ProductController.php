<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Validator;

class ProductController extends Controller
{
    //
    public function list(){

        $prods = Product::get();
        // $cats = Category::get();
        foreach($prods as $prod){
            $cat=Category::where('id',$prod->category_id)->first();
            if($cat){
            $prod['cat_name']=$cat->name;
            }else{
                $prod['cat_name']='---';
            }
        }
        return view('admin/products/list',compact('prods'));

    }

    public function list_mode_user($id){

        $prods = Product::where('category_id',$id)->get();

        return view('products',compact('prods'));

    }

    public function insert(){
        $cats = Category::get();
        return view('admin/products/insert',compact('cats'));
    }

    public function save(Request $request){
        
        $data = $request->all();

        $rules=[
            'name' => 'required',
            'price' => 'required|numeric'
        ];

        $message = [
            'name.required' => 'نام را وارد کنید',
            'price.required' => 'قیمت را وارد کنید',
            'price.numeric' => 'قیمت باید عددی باشد'
        ];

        $valid = Validator::make($data,$rules,$message);
        
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        $prod = new Product();

        $prod->name = $request->name;
        $prod->price = $request->price;
        $prod->offer = $request->offer;
        $prod->category_id = $request->category_id;

        $prod->save();

        return redirect('/admin/products');

    }

    public function edit($id){

        $prod = Product::where('id',$id)->first();
        $cats = Category::get();
        return view('admin/products/edit',compact('prod','cats'));
    }

    public function save_edit($id,Request $request){

        $data = $request->all();

        $rules=[
            'name' => 'required',
            'price' => 'required|numeric'
        ];

        $message = [
            'name.required' => 'نام را وارد کنید',
            'price.required' => 'قیمت را وارد کنید',
            'price.numeric' => 'قیمت باید عددی باشد'
        ];

        $valid = Validator::make($data,$rules,$message);
        
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }


        $data = $request->all();

        $rules=[
            'name' => 'required',
            'price' => 'required|numeric'
        ];

        $message = [
            'name.required' => 'نام را وارد کنید',
            'price.required' => 'قیمت را وارد کنید',
            'price.numeric' => 'قیمت باید عددی باشد'
        ];

        $valid = Validator::make($data,$rules,$message);
        
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }

        $prod = Product::where('id',$id)->first();

        $prod->name = $request->name;
        $prod->price = $request->price;
        $prod->offer = $request->offer;
        $prod->category_id = $request->category_id;

        $prod->save();

        return redirect('/admin/products');

    }

    public function delete($id){

        $prod = Product::where('id',$id)->first();
        $prod->delete();
        return redirect('/admin/products');
    }
}
