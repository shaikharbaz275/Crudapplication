<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;

class PageController extends Controller
{
    public function home()
    {
        $dt = Carbon::now();
        $date = $dt->toDateString();
        $products = Product::whereDate('toactive', '>=', $date)->Where('status' , true)->paginate(20);
        return view('user.home', compact('products'));
    }


    public function productDetail(Product $product)
    {
       return view('user.product.detail',compact('product'));
    }
}
