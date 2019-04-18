@extends('layouts.adminlayout')

@section('midadmin')
    <div> <a href="{{route('adminproduct.create')}}"> Insert Product </a></div>
    <div class="table-responsive-sm">
        <table class="table table-striped table table-hover table-primary">
            <thead>
            <tr>

                <th scope="col">idProduct</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">description</th>
                <th scope="col">start date of production</th>
                <th scope="col"> price </th>
                <th scope="col">category</th>
                <th scope="col"> update </th>
                <th scope="col">delete</th>

            </tr>
            </thead>
            <tbody id="products">
            @foreach($products as $u)
                <tr>

                    <td>{{$u->idProduct}}</td>
                    <td>{{$u->nameProduct}}</td>
                    <td> <img src="{{asset('/')}}images/{{$u->image}}" alt="{{$u->alt}}" class="figure-img"> </td>
                    <td>{{$u->description}}</td>
                    <td>{{$u->date}}</td>
                    <td>${{$u->articlePrice}}</td>
                    <td>{{$u->name}}</td>

                    <td> <a href="{{route('adminproduct.edit' , ['adminuser' =>$u->idProduct])}}">
                            <i class="material-icons">update</i>
                        </a>
                    </td>
                    <td>

                        <a href="#" >

                            <i class="material-icons deleteProduct" data="{{$u->idProduct}}"> delete_forever</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row" data-aos="fade-up">

            {{ $products->links() }}

        </div>
    </div>


@endsection
@section("scripts")

    <script src="{{asset('/')}}js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/')}}js/jquery-ui.js"></script>
    <script src="{{asset('/')}}js/deleteproduct.js"></script>

@endsection