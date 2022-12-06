<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use DataTables;

class SubCategoryController extends AdminThemeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            $data = SubCategory::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if ($row->status == 0) {
                        return '<label class="badge badge-primary">Active</label>';
                    } else {

                        return '<label class="badge badge-success">Deactive</label>';
                        
                    }
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
                    $btn = '<a href="'.route('subcategory.edit',$row->id).'"><button class="btn btn-primary btn-sm me-2 mt-2"><i class="fas fa-edit"></i></button></a>';
                    $btn = $btn.' <a href="'.route('subcategory.show',$row->id).'"><button class="btn btn-info btn-sm me-2 mt-2"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                    $btn = $btn.'<form action="'.route('subcategory.destroy',$row->id).'" method="POST"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm me-2 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['action', 'status','image','categories_id'])
                ->make(true);
        }

         $subcategorys = SubCategory::get();
        return view('admin.subcategory.index',compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $categories = Category::pluck('name','id')->toArray();
        
        return view('admin.subcategory.create', compact('categories'));
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
            'categories_id' => 'required',
            'sub_categories_name' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 0 : 1;
        $input['categories_id'] = $request->categories_id;


        if  ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        SubCategory::create($input);

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $categories = Category::pluck('name','id')->toArray();

        return view('admin.subcategory.show',compact('subcategory','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {       
         $categories = Category::pluck('name','id')->toArray();

           return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'categories_id' => 'required',
            'sub_categories_name' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $input = [];
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 0 : 1; 
        $input['categories_id'] = isset($input['categories_id']) ? $key : 1;

         if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $subcategory->update($input);

        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
           $subcategory->delete();
            return redirect()->route('subcategory.index');
    }
}
