<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;


class WishlistController extends Controller
{
    public function index(){
        $items = Cart::instance('wishlist')->content();
        $productIDs = [] ; 
        foreach ($items as $key => $value) {
                array_push($productIDs,$value->id);
        }
        $products = Product::whereIn('productID',$productIDs)->get();
        
        return view('wishlist', compact('items','products'));
    }

    public function add_to_wishlist(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
    
        // Retrieve the product to get its image
        $product = Product::find($id);
        $imageUrl = $product->images->isNotEmpty() ? $product->images->first()->image_url : 'default_image.jpg';
        
        Cart::instance('wishlist')->add($id, $name, $quantity, $price, [
            'image_url' => $imageUrl,
        ]);
        
        session()->flash('success', 'Đã thêm sản phẩm vào yêu thích!');
        
        return redirect()->back();
    }
    

    public function remove_item($rowId){
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back()->with('success','Đã xóa sản phẩm ra khỏi wishlist');
    }

    public function empty_wishlist(){
        Cart::instance('wishlist')->destroy();
        return redirect()->back()->with('success','Đã xóa tất cả sản phẩm ra khỏi wishlist');
    }

    public function move_to_cart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price);
        return redirect()->back();
    }
}
