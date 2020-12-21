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
                <div class="card-header bg-primary text-center">{{ ('View Shoe') }}</div>
                <div class="card-body bg-white">
                    <div class="row">
                        @foreach ($itemData as $item)
                        <div class="col-md-4">
                            <div class="card p-2 border border-white">
                                <a href="{{ url('/detail/'.$item->itemID) }}">
                                    <img src='{{ asset('/storage/'.$item->itemImage) }}' class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->itemName}}</h5>
                                        <p class="card-text"><small class="text-muted">{{$item->itemDescription}}</small></p>
                                        <p class="card-text text-primary">Rp. {{$item->itemPrice}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3 mx-auto">
                        {{ $itemData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
