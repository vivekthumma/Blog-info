<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminThemeController extends Controller
{
    public function __construct()
    {

    view()->share('adminTheme','adminTheme.default');
    
    }
}
