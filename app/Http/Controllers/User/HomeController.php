<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('qty', '>', '0')->paginate(9)->toArray();
        $products['data'] = array_map(function($product) {
            $product['price'] = number_format($product['price'], 0, ',', '.');
            return $product;
        }, $products['data']);
        $products['links'][0]['label'] = '&laquo;';
        $products['links'][count($products['links']) - 1]['label'] = '&raquo;';
        // dd($products);

        return view('user.home', compact('products'));
    }
}
