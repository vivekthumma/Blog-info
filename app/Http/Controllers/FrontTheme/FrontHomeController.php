<?php

namespace App\Http\Controllers\FrontTheme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontTheme\FrontThemeController;
use App\Models\Product;
class FrontHomeController extends FrontThemeController
{
    public function home()
    {
        return view('frontHome.home');
    }

    public function about()
    {
            return view('frontHome.about');
    }

    public function brand()
    {        
        
        $products = Product::get();
        return view('frontHome.brand',compact('products'));
    }

    public function showdetailpage($slug)     
    {        
        $product = Product::where('slug',$slug)->first();
        return view('frontHome.showdetailpage',compact('product'));
    }

    public function blog()
    {
        return view('frontHome.blog');
    }

    public function contact()
    {
        return view('frontHome.contact');
    }

    public function testimonial()
    {
        return view('frontHome.testimonial');
    }


}
    



    