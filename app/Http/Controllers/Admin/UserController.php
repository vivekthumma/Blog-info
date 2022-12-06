<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DataTables;

class UserController extends AdminThemeController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('type', function($row){
                        if ($row->type == 0) {
                            return '<label class="badge badge-primary">user</label>';
                        } else {

                            return '<label class="badge badge-success">admin</label>';
                            
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('user.edit',$row->id).'"><button class="btn btn-primary btn-sm me-2 mt-2"><i class="fas fa-edit"></i></button></a>';
                        $btn = $btn.' <a href="'.route('user.show',$row->id).'"><button class="btn btn-info me-2 btn-sm mt-2"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                        $btn = $btn.'<form action="'.route('user.destroy',$row->id).'" method="POST"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm me-2  mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'type'])
                    ->make(true);
        }

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' =>'required',
            'email' =>'required',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
            'type' => 'required'
        ],
            [
            'name.required' => 'Name field is required.',

            ]);

        $input = [];
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        User::create($input);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
           'name' =>'required',
            'email' =>'required',
            'password' => 'min:4',
            'confirm_password' => 'same:password',
            'type' => 'required'
        ]);

        $input = [];
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
            
        $user->update($input);

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        $user->delete();

        return redirect()->route('user.index');
    }
}
