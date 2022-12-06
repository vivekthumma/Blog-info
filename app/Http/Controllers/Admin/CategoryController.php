<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends AdminThemeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
    
        if ($request->ajax()) {
            $data = Category::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if ($row->status == 0) {
                        return '<label class="badge badge-primary">Active</label>';
                    } else {

                        return '<label class="badge badge-success">Deactive</label>';
                        
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('category.edit',$row->id).'"><button class="btn btn-primary btn-sm me-2 mt-2"><i class="fas fa-edit"></i></button></a>';
                    $btn = $btn.' <a href="'.route('category.show',$row->id).'"><button class="btn btn-info btn-sm me-2 mt-2"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                    $btn = $btn.'<form action="'.route('category.destroy',$row->id).'" method="POST"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger me-2 btn-sm mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        
        return view('admin.category.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'name' =>'required',
        ]);
        
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 0 : 1;

        Category::create($input);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
        
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' =>'required',
        ]);

        $input = [];
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 0 : 1;        
        $category->update($input);

        return redirect()->route('category.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
