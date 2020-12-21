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
                <div class="card-header bg-primary text-center">{{ ('Add To Cart') }}</div>
                <div class="card-body bg-white">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/'.$itemData->itemImage) }}" class="card-img-top mb-5" alt="...">
                            <form action="{{url('/addToCart/'.$itemData->itemID)}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="qty" placeholder="ex. 1" name="qty">
                                </div>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <H1>{{$itemData->itemName}}</H1><br>
                            <H3>Rp. {{$itemData->itemPrice}}</H3><br>
                            <H3>{{$itemData->itemDescription}}</H3><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
