<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\user;
use App\Brand;
use App\Type;
use Cart;
use Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = Type::find($id)->products()->where('status', '=' , 1)->where('quantity', '>' , 0)->orderBy('name','asc')->paginate(9);

        return view('store.index')->with('products', $products);
    }    

    public function cart()
    {
        if(Auth::check()){
            if(Cart::count() > 0){
                $user_id = auth()->user()->id;
                $userdetails = User::find($user_id)->userdetails;

                return view('store.cart')->with('userdetails', $userdetails);
            }else{
                return redirect('userdetails/'.auth()->user()->id)->with('error', 'No Items within your Cart');
            }
        }else{
            return redirect('register')->with('error', 'Please create an account to add products to cart.');
        }
    }  

    # Our function for adding a certain product to the cart
    public function addToCart(Product $product)
    {
        Cart::add($product->id, $product->name, 1, $product->price);
        return redirect('/cart');
    }

    # Our function for removing a certain product from the cart
    public function removeProductFromCart($productId)
    {
        Cart::remove($productId);
        return redirect('/cart');
    }

    public function ordersuccess()
    {
        return view('store.success');
    }

    public static function showimage($id)
    {
        $product = Product::find($id);
        return $product->image;
    }

    public static function showproductname($id)
    {
        $product = Product::find($id);
        return $product->name;
    }

    public static function showbrandname($id)
    {
        $brands = Product::find($id)->brand()->get()->first();
        return $brands->name;
    }

}
