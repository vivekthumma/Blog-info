<?php

namespace App\Http\Controllers\FrontTheme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontThemeController extends Controller
{
     public function __construct(){
        // return view('admin.home');
         view()->share('frontTheme', 'frontTheme.default');
    }

}

