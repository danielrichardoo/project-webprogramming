<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        if(Auth::user()->roleID == 1)
        {
            $transaction = Transaction::all();
        }
        else
        {
            $transaction = Transaction::where('userID', Auth::user()->userID)->get();

        }
        return view('transaction',compact('transaction'));
    }

    public function add()
    {
        $cartData = Cart::where('userID',Auth::user()->userID)->get();
        $totalPrice = 0;

        foreach ($cartData as $cart) {
            $totalPrice = $totalPrice + ($cart->getItem()->first()->itemPrice * $cart->itemQty);
        }

        Transaction::create([
            'userID' => Auth::user()->userID,
            'totalPrice' => $totalPrice,
        ]);

        $transactionData = Transaction::all()->count();

        foreach ($cartData as $cart) {
            TransactionDetail::create([
                'transactionID' => $transactionData,
                'itemID' => $cart->itemID
            ]);
        }

        foreach ($cartData as $cart) {
            $cart->delete();
        }

        return redirect('/');
    }
}
