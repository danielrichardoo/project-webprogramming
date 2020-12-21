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
                <div class="card-header bg-primary text-center">{{ ('View All Transaction') }}</div>
                <div class="card-body bg-white">
                    <div class="row row-cols-1">
                        @foreach($transaction as $trans)
                        <div class="card">
                            <div class="card-header bg-info text-center">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        {{ ($trans->created_at) }}
                                    </div>
                                    <div class="col">
                                        Total Rp. {{$trans->totalPrice}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($trans->getTransaction as $detail)
                                    <div class="col-auto">
                                        <img src="{{ asset('/storage/'.$detail->getItem->itemImage)}}" alt="" style="height: 100px; width: 100px">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
