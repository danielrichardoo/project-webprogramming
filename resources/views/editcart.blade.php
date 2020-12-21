@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-2 ml-0 bg-primary h-100">
            <ul class="nav flex-column">
                @guest
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}">View All Shoe</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}">View All Shoe</a>
                </li>
                @if (Auth::user()->roleID == 2)
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/cart')}}">View Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/transaction')}}">View Transaction</a>
                </li>
                @elseif (Auth::user()->roleID == 1)
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/addShoe')}}">Add Shoe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/transaction')}}">View All Transaction</a>
                </li>
                @endif
                @endguest
            </ul>
        </div>
        <div class="col-md-2">
            <img src="{{ asset('/storage/'.$cartData->getItem->itemImage) }}" class="card-img-top" alt="...">
        </div>
        <div class="col-md-8">
            <H1>{{$cartData->getItem->itemName}}</H1>
            <H3>Price : Rp. {{$cartData->getItem->itemPrice}}</H3>
            <H3>Description :</H3>
            <H3>{{$cartData->getItem->itemDescription}}</H3>
            <form action={{url('/cart/'.$cartData->itemID)}} method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 col-2">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="qty" placeholder="ex. 1" name="qty" value="{{ $cartData->itemQty}}">
                </div>
                <button type="submit" class='btn btn-primary btn-large btn-start mx-3' name='update' value='update'>Update Cart!</button>
                <button type="submit" class='btn btn-primary btn-large btn-start' name='delete' value='delete'>Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
