@extends('layouts.layout')

@section('title') Products @endsection




@section('mid')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{asset('/')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Products</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4"><h2 class="text-black h5">Shop  {{$product[0]->name}}</h2></div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        @foreach($prcategory as $p)
                                            <a class="dropdown-item" href="{{asset('/')}}shopByCategory/{{$p->idCategory}}">{{$p->name}}</a>
                                        @endforeach
                                            @foreach($primaryCategorySub as $p)
                                                <a class="dropdown-item" href="{{asset('/')}}shopClothes">{{$p->name}}</a>
                                            @endforeach


                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">

                                        @if(session()->get('category')[0]=='all')
                                            <a class="dropdown-item" href="{{asset('/')}}SortNameAZ/">Name, A to Z</a>
                                            <a class="dropdown-item" href="{{asset('/')}}SortNameZA/">Name, Z to A</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{asset('/')}}SortPriceLow/">Price, low to high</a>
                                            <a class="dropdown-item" href="{{asset('/')}}SortPriceHight/">Price, high to low</a>
                                       @else
                                        <a class="dropdown-item" href="{{asset('/')}}SortNameAZ/{{$product[0]->idCategory}}">Name, A to Z</a>
                                        <a class="dropdown-item" href="{{asset('/')}}SortNameZA/{{$product[0]->idCategory}}">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{asset('/')}}SortPriceLow/{{$product[0]->idCategory}}">Price, low to high</a>
                                        <a class="dropdown-item" href="{{asset('/')}}SortPriceHight/{{$product[0]->idCategory}}">Price, high to low</a>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
@foreach($product as $p)
                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">
                                    <a href="{{asset('/')}}singleProduct/{{$p->idProduct}}"><img src="{{asset('/')}}images/{{$p->image}}" alt="{{$p->alt}}" class="img-thumbnail"></a>
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="{{asset('/')}}singleProduct/{{$p->idProduct}}">{{$p->nameProduct}}</a></h3>
                                    <p class="mb-0">Finding perfect  {{$p->name}}</p>
                                    <p class="text-primary font-weight-bold">{{$p->articlePrice}} $</p>
                                </div>
                            </div>
                        </div>
       @endforeach

                    </div>
                    <div class="row" data-aos="fade-up">

                                {{ $product->links() }}

                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="{{asset('/')}}shopAll" class="d-flex"><span>all</span> <span class="text-black ml-auto">({{$count}})</span></a></li>
                            @foreach($prcategory as $p)
                            <li class="mb-1"><a href="{{asset('/')}}shopByCategory/{{$p->idCategory}}" class="d-flex"><span>{{$p->name}}</span> <span class="text-black ml-auto">({{$p->product_count}})</span></a></li>
                            @endforeach
                                @foreach($primaryCategorySub as $p)
                                    <li class="mb-1"><a href="{{asset('/')}}shopClothes" class="d-flex"><span>{{$p->name}}</span> <span class="text-black ml-auto">({{$p->product_count}})</span></a></li>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($subcategory as $p)
                                            <li class="mb-1"><a href="{{asset('/')}}shopByCategory/{{$p->idCategory}}" class="d-flex"><span>{{$p->name}}</span> <span class="text-black ml-auto">({{$p->product_count}})</span></a></li>
                                        @endforeach
                                    </ul>
                                @endforeach

                        </ul>
                    </div>


                </div>
            </div>


            @endsection
            @section('ourOffer') @include('partial.ourOffer') @endsection