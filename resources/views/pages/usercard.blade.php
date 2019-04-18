@extends('layouts.layout')

@section('title') Contact @endsection

@section('mid')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{asset('/')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">User finished carts</strong></div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row mb-5">

                <div> <a href="{{asset('/')}}updateformuser/{{$id}}"> Update your oersonal data</a></div>

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

                            </tr>
                            </thead>
                            <tbody>
                            @if(!$exist)
                                <tr> <td colspan="6"><a  href="{{asset('/')}}shopAll" >You have never bought our profucts. go to shop and by something.</a> </td></tr>
                            @endif
                            @if($exist)

                                    @foreach($productsUser as $p)
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

                                                    <input type="text" class="form-control text-center "  name="sum" id="sum" value="{{$p->sum}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>

                                                </div>

                                            </td>
                                            <td>${{$p->articlePrice * $p->sum}}</td>

                                        </tr>
                                    @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            @if($exist)
            <div class="row" data-aos="fade-up">

                {{ $productsUser->links() }}

            </div>

                <div class="row mb-5">
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">good total lost</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Your total lost money</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">
                                            @if($exist)

                                                ${{$totalPriceUserEndCard->total_price}}

                                            @endif
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

    </div>
    </div>
@endsection

