<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $search = $request->search;
        if($search == null)
        {
            $itemData= Item::paginate(6);
        }
        else
        {
            $itemData = Item::where('itemName','LIKE', '%'.$search.'%' )->paginate(6);
        }

        return view('home',compact("itemData"));
    }
}
