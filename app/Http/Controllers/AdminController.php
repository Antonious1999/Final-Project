<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\support\Facades\File;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        
        return view('admin.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //upload request
        $file_extension = $request->photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'upload_product';
        $request->photo->move($path, $file_name);
        Product::create([
            'picture' => $file_name,
            'name' => $request->name,
        ]);
        return redirect()->back()->with('add', 'product Uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Product = Product::find($id);
        $img_destination = 'upload_Product/' . $Product->picture;
        
        if (File::exists($img_destination)) {
            File::delete($img_destination);
        }
        $Product->delete();
        return redirect()->back();
    }
    public function userspage(){
        $products=Product::all();
        return view('user.allproducts',compact('products'));
    }
    public function search(Request $request){
       // return "done";
       $search=$request->search;
       $Products= Product::select('*')->where('name', $search)->get();
     // return $Products;
     return view('search',compact('Products'));

    }
}
