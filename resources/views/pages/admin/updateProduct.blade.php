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
    <form action="{{route('adminproduct.update'  , ['adminuser' =>$p->idProduct])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Name Product</label>
            <input type="text" class="form-control" id="name" value="{{$p->nameProduct}}"  placeholder="Name" name="name">
        </div>

        <!-- Ubaci fajl -->
        <label>Image</label>
        <lable> If you don't thing to update image make sure that file is empty </lable>
        <input type="file" name="image" class="form-control"/>


        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea class="form-control" name="description" rows="5" id="comment">{{$p->description}}</textarea>
        </div>




        <div><button type="submit" class="btn btn-primary" name="btnupdateProduct">update product</button> </div>
    </form>



@endsection