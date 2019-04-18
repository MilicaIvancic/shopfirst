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
    <form action="{{route('adminmenu.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>href</label>
            <input type="text" class="form-control" id="href"   placeholder="href" name="href">
        </div>

        <div class="form-group">
            <label>name menu</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>




        <div><button type="submit" class="btn btn-primary" name="insertmenu">insert menu</button> </div>
    </form>



@endsection