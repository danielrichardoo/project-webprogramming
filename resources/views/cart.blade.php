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
        <div class="col-md-8 mx-auto">
            <div class="card justify-content-center border border-light">
                <div class="card-header bg-primary text-center">{{ ('View Cart') }}</div>
                <div class="card-body bg-white mx-auto">
                    <div class="row row-cols-5">
                        @foreach ($cartData as $cart)
                        <div class="col my-4">
                            <img src="{{ asset('/storage/'.$cart->getItem->itemImage) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col my-auto">
                            <p>{{$cart->getItem->itemName}}</p>
                        </div>
                        <div class="col my-auto">
                            <p>{{$cart->itemQty}}</p>
                        </div>
                        <div class="col my-auto">
                            <p>Rp. {{$cart->getItem->itemPrice * $cart->itemQty}}</p>
                        </div>
                        <div class="col my-auto">
                            <form action={{url('/editCart/'.$cart->getItem->itemID)}} method="GET">
                                <button type='submit' class='btn btn-primary btn-large btn-start'>Edit</button>
                            </form>
                        </div>
                        @endforeach

                        @if(count($cartData) > 0)
                        <div class="bottom-right" style="position: absolute; bottom: 0; right: 0;">
                            <form action={{url('/checkout')}} method="POST">
                                @csrf
                                <button type='submit' class='btn btn-primary btn-large btn-start rounded-0'>Check Out</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
