<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use DataTables;

class ProductController extends AdminThemeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =Product::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if ($row->status == 0) {
                        return '<label class="badge badge-primary">Active</label>';
                    } else {

                        return '<label class="badge badge-success">Deactive</label>';
                        
                    }
                })
                
                ->addColumn('sub_categories_id', function($row){

                    return $row->subcategory->sub_categories_name;
                })

                ->addColumn('categories_id', function($row){
                    return $row->category ? $row->category->name : '';
                })
                ->addColumn('image', function($row){
                        $url= asset('images/'.$row->image);
                        $image = '<img src="'.$url.' " width="130" height="90" " class="" align="center" />';
                        return $image;
                        })

                
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('product.edit',$row->id).'"><button class="btn btn-primary me-2 mt-2"><i class="fas fa-edit"></i></button></a>';
                    $btn = $btn.' <a href="'.route('product.show',$row->id).'"><button class="btn btn-info me-2 mt-2"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                    $btn = $btn.'<form action="'.route('product.destroy',$row->id).'" method="POST"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger me-2 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['action', 'status','image','categories_id','sub_categories_id'])
                ->make(true);
        }

         
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name','id')->toArray();
        $sub_categories = SubCategory::pluck('sub_categories_name','id')->toArray();                
        return view('admin.product.create', compact('categories','sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         $request->validate([
            'sub_categories_id'=> 'required',
            'categories_id' => 'required',
            'name' =>'required',
            'slug',
            'price'=>'required',
            'description'=>'required',    
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        
        $input = $request->all();        
        $input['slug'] = Str::slug($request->name, '-');
        $input['status'] = isset($input['status']) ? 0 : 1;
        $input['categories_id'] = $request->categories_id;
        $input['sub_categories_id'] = $request->sub_categories_id;


        if  ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
        Product::create($input);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::pluck('name','id')->toArray();
        $sub_categories = SubCategory::pluck('sub_categories_name','id')->toArray();
        $products =Product::pluck('categories_id','sub_categories_id')->toArray();
        return view('admin.product.show',compact('categories','sub_categories','products','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {       
        
        
        $categories = Category::pluck('name','id')->toArray();
        $sub_categories = SubCategory::pluck('sub_categories_name','id')->toArray();
        $products =Product::pluck('categories_id','sub_categories_id')->toArray();
        return view('admin.product.edit', compact('categories','sub_categories','products','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {          
        $request->validate([
            'sub_categories_id'=> 'required',
            'categories_id' => 'required',
            'name' =>'required',
            'price'=>'required',
            'description'=>'description',
            // 'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        

        $input = [];
        $input = $request->all();
        $input['slug'] = Str::slug($request->name, '-');

        $input['status'] = isset($input['status']) ? 0 : 1; 
        $input['categories_id'] = isset($input['categories_id']) ? $key : 1;
        $input['sub_categories_id'] = isset($input['sub_categories_id'])? $key : 1;;

         if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        $product->update($input);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
            return redirect()->route('product.index');
    }

    public function fetchSubCategory(Request $request)
    {   

       
        $data = SubCategory::where("categories_id", $request->categories_id)->pluck("sub_categories_name", "id");
        
        $view = view('admin.subcategory.ajax.subcategory', compact('data'))->render();


        return response()->json($view);
    }
}
