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
    <form action="{{route('adminuser.update' , ['adminuser' =>$user->idUser])}}" method="post">

        @csrf
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="name" value="{{$user->userName}}" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input type="text" class="form-control" id="surname"  value="{{$user->surname}}" placeholder="Surname" name="surname">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label>Adress</label>
            <input type="text" class="form-control" id="adress" value="{{$user->address}}" placeholder="Adress" name="adress">
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" class="form-control" id="mobile" value="{{$user->mobileFone}}" placeholder="mobile fone" name="mobile">
        </div>

        <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control"  name="activ" id="sel1">
                <option value="0"  @if($user->active==0)   selected @endif> NOT active user</option>
                <option value="1" @if($user->active==1)   selected @endif> active user</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="btnupdateuser">Update</button>
    </form>



@endsection