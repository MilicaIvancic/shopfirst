@extends('layouts.layout')

@section('title') Single product @endsection

@section('mid')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{asset('/')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$product->nameProduct}}</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('/')}}images/{{$product->image}}" alt="{{$product->alt}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="text-black">{{$product->nameProduct}}</h2>
                <p>{{$product->description}}</p>

                <p><strong class="text-primary h4">{{$product->articlePrice}} $</strong></p>
                <form action="{{asset('/')}}addToCard/{{$product->idProduct}}" method="post">
                    @csrf
                <div class="mb-1 d-flex">
                    @foreach($size as $s)
                    <label for="option-sm" class="d-flex mr-3 mb-3">
                        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" name="size" value="{{$s->idSize}}" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">{{$s->nameSize}}</span>
                    </label>
                    @endforeach
                </div>
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" name="sum" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                    </div>

                </div>
                <p><button  name="btnadTocard"class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
                    </form>
                @isset($errors)
                    <ul class="list-group" >
                        @foreach($errors->all() as $greska)
                            <li class="list-group-item list-group-item-danger"> {{ $greska }} </li>
                        @endforeach
                        @endisset
                    </ul>
            </div>
        </div>
    </div>
</div>

 @endsection

@section('ourOffer') @include('partial.ourOffer') @endsection