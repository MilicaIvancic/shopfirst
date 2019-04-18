@extends('layouts.layout')

@section('title') Contact @endsection

@section('mid')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{asset('/')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Card</strong></div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row mb-5">


                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$exist)
                               <tr> <td colspan="6"><button  class="btn btn btn-primary js-btn-plus btn-block createCard" data-id="{{$user->idUser}}"type="button">CREATE CARD</button> </td></tr>
                                @endif
                            @if($exist)
                                @if($productsexist)
                                    @foreach($products as $p)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{asset('/')}}images/{{$p->image}}" alt="{{$p->alt}}" class="img-milica">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{$p->nameProduct}}</h2>
                                            </td>
                                            <td>${{$p->articlePrice}}</td>
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button data-idsi="{{$p->idItemcard}}" class="btn btn-outline-primary js-btn-minus loversum" type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center "  name="sum" id="sum" value="{{$p->sum}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                                                    <div class="input-group-append">
                                                        <button data-ids="{{$p->idItemcard}}" class="btn btn-outline-primary js-btn-plus update" type="button">&plus;</button>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>${{$p->articlePrice * $p->sum}}</td>
                                            <td><a href="{{asset('/delete')}}" data-id="{{$p->idItemcard}}" class="btn btn-primary btn-sm delete">X</a></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                @if(!$productsexist)
                                <tr> <td colspan="6"><button  class="btn btn-outline-primary btn-sm btn-block backtoshop" type="button">Your card is empty, back to shop and add items</button> </td></tr>
                                    @endif
                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-sm btn-block backtoshop">Continue Shopping</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">
                                        @if($exist)
                                            @if($productsexist)

                                          ${{$totalPrice->total_price}}


                                            @endif
                                            @endif
                                    </strong>
                                </div>
                            </div>
                            @if($exist)
                                @if($productsexist)
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='{{asset('/')}}congratulatio/{{$products[0]->idCard}}'">Proceed To Checkout</button>
                                </div>
                            </div>
                                @endif
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

    <script src="{{asset('/')}}js/createCard.js"></script>
    <script src="{{asset('/')}}js/backToShop.js"></script>
    <script src="{{asset('/')}}js/updateitem.js"></script>
    <script src="{{asset('/')}}js/delete.js"></script>
    <script src="{{asset('/')}}js/loverSum.js"></script>
    @endsection