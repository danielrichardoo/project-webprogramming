<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function detail(Request $request, $id)
    {
        $itemData = Item::where('itemID',$id)->first();
        return view('item',compact('itemData'));
    }

    public function index(){
        return view('addshoe');
    }

    public function indexupdate(Request $request, $id){
        $itemData = Item::where('itemID',$id)->first();
        return view('updateshoe',compact('itemData'));
    }

    protected function add(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:100'],
            'image' => ['required', 'image'],
            'description' => ['required', 'string'],
        ]);

        $imageName = request('image')->store('/assets/shoe', 'public');

        Item::create([
            'itemName' => $request['name'],
            'itemPrice' => $request['price'],
            'itemImage' => $imageName,
            'itemDescription' => $request['description'],
        ]);

        return redirect('/');
    }

    protected function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:100'],
            'image' => ['image'],
            'description' => ['required', 'string'],
        ]);

        $itemData = Item::where('itemID',$id)->first();

        if(request('image') == null){
            $itemData->itemName = $request->name;
            $itemData->itemPrice = $request->price;
            $itemData->itemDescription = $request->description;
            $itemData->save();
        }else{
            $imageName = request('image')->store('/assets/shoe', 'public');
            $itemData->itemName = $request->name;
            $itemData->itemPrice = $request->price;
            $itemData->itemImage = $imageName;
            $itemData->itemDescription = $request->description;
            $itemData->save();

        }

        return redirect('/');
    }


}

