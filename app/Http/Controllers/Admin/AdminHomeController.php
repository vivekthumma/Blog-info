<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends AdminThemeController
{
    public function dashboard()
    {
        // dd('hee');
        return view('admin.home');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin.home');
    }
   
}
