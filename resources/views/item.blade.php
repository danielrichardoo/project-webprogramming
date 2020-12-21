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
            <img src="{{ asset('/storage/'.$itemData->itemImage) }}" class="card-img-top" alt="...">
        </div>
        <div class="col-md-8">
            @guest
            <H1>{{$itemData->itemName}}</H1>
            <H3>Price : Rp. {{$itemData->itemPrice}}</H3>
            <H3>Description :</H3>
            <H5>{{$itemData->itemDescription}}</H5>
            @else
            <H1>{{$itemData->itemName}}</H1>
            <H3>Price : Rp. {{$itemData->itemPrice}}</H3>
            <H3>Description :</H3>
            <H5>{{$itemData->itemDescription}}</H5>
            @if (Auth::user()->roleID == 2)
            <form action={{url('/addToCart/'.$itemData->itemID)}} method="GET">
                <button type="submit" class='btn btn-primary btn-large btn-start'>Add to Cart</button>
            </form>
            @elseif(Auth::user()->roleID == 1)
            <form action={{ url('/updateShoe/'.$itemData->itemID) }} method="GET">
                <button type="submit" class='btn btn-primary btn-large btn-start'>Update Shoe</button>
            </form>
            @endif
            @endguest
        </div>
    </div>
</div>
@endsection
