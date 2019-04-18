@extends('layouts.layout')


@section('title') StreetShop @endsection


@section('collection')

    <div class="site-section site-blocks-2">
        <div class="container">
            <div class="row">

                @foreach($collection as $p)

                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" @if($p->idCategory!=1)href="{{asset('/')}}shopByCategory/{{$p->idCategory}}"> @endif
                        @if($p->idCategory==1)href="{{asset('/')}}shopClothes"> @endif
                        <figure class="image">
                            <img src="{{asset('/')}}images/{{$p->imageCategory}}" alt="{{$p->name}}" class="img-fluid">
                        </figure>
                        <div class="text">
                            <span class="text-uppercase">Collections</span>
                            <h3>{{$p->name}}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('ourOffer')
    @include('partial.ourOffer')

@endsection

@section('featureProducts')
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Featured Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($product as $p)
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <img src="{{asset('/')}}images/{{$p->image}}" alt="{{$p->alt}}" class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="#">{{$p->nameProduct}}</a></h3>
                                        <p class="mb-0">Finding perfect products</p>
                                        <p class="text-primary font-weight-bold">{{$p->articlePrice}} $</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
