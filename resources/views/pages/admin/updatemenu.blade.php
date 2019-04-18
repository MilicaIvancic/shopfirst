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
    <form action="{{route('adminmenu.update' , ['adminuser' =>$menu->idMenu] )}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>href</label>
            <input type="text" class="form-control" id="href"   value="{{$menu->href}}" placeholder="href" name="href">
        </div>

        <div class="form-group">
            <label>name menu</label>
            <input type="text" class="form-control" id="name" placeholder="Name" value="{{$menu->menuName}}" name="name">
        </div>




        <div><button type="submit" class="btn btn-primary" name="insertmenu">update menu</button> </div>
    </form>



@endsection