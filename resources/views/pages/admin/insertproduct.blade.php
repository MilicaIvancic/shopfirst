@extends('layouts.adminlayout')

@section('midadmin')


    @isset($errors)
        <ul class="list-group" >
            @foreach($errors->all() as $greska)
                <li class="list-group-item list-group-item-danger"> {{ $greska }} </li>
            @endforeach
        </ul>
        <br/> <br/>
    @endisset
    <form action="{{route('adminproduct.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name Product</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>

        <!-- Ubaci fajl -->
        <label>Image</label>
        <input type="file" name="image" class="form-control"/>


        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea class="form-control" name="description" rows="5" id="comment"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">price</label>
            <input type="text" class="form-control"  placeholder="price" name="price">
        </div>

        <!--Iscitati kategorije-->
        <div class="form-group">
            <label for="sel1">Select category:</label>
            <select class="form-control"  name="category" id="sel1">
                @foreach($category as $c)
                    @if($c->name!='clothes')
                <option value="{{$c->idCategory}}" >{{$c->name}}</option>
                    @endif

                @endforeach
            </select>
        </div>
        <!--Iscitati velicine-->
        <label>Select available size</label>


            @foreach($size as $s)
                <div class="checkbox">
                    <label><input type="checkbox" id="{{$s->idSize}}" name="size[]" value="{{$s->idSize}}">{{$s->nameSize}}</label>
                </div>
                @endforeach





        <div><button type="submit" class="btn btn-primary" name="btnInsertProduct">Insert User</button> </div>
    </form>



@endsection