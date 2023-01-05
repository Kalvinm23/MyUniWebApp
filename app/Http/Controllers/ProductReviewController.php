<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductReview;
use App\Product;

class ProductReviewController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        return view('productreview.create')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //validate data
        $this->validate($request,[
          'review' => 'required',
        ]);

        //create productReview table input
        $productreview = new ProductReview;
        $productreview->user_id = auth()->user()->id;
        $productreview->product_id = $id;
        $productreview->review = $request->input('review');
        $productreview->save();

        return redirect('/product/'.$id)->with('success', 'Review Created');
    }

}
