<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $cartData = Cart::where('userID',Auth::user()->userID)->get();
        return view('cart', compact('cartData'));
    }

    public function add(Request $request,$id){
        $cartData = Cart::where('itemID', $id)->first();
        if($cartData != null && $cartData->userID == Auth::user()->userID){
            $cartData->itemQty = $cartData->itemQty + $request->qty;
            $cartData->save();
        } else {
            Cart::create([
                'itemID' => $id,
                'itemQty'=> $request->qty,
                'userID' => Auth::user()->userID
            ]);
        }
        return redirect('/');
    }

    public function view($id){
        $itemData = Item::where('itemID',$id)->first();
        return view('addtocart',compact('itemData'));
    }

    public function edit($id){
        $cartData = Cart::where('itemID',$id)->where('userID',Auth::user()->userID)->first();
        return view('editcart',compact('cartData'));
    }

    public function editItem(Request $request, $id){
        $cartData = Cart::where('itemID',$id)->where('userID',Auth::user()->userID)->first();
        if(($request->qty <= 0 && $request->input('update') ) || $request->input('delete')){
            $cartData->delete();
        }else if ($request->qty > 0 && $request->input('update')){
            $cartData->itemQty = $request->qty;
            $cartData->save();
        }

        return redirect('/cart');
    }
}
