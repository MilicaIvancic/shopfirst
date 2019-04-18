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
            <form action="{{route('adminuser.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <label>Surname</label>
                    <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label>Adress</label>
                    <input type="text" class="form-control" id="adress" placeholder="Adress" name="adress">
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" id="mobile" placeholder="mobile fone" name="mobile">
                </div>


                <button type="submit" class="btn btn-primary" name="btnregister">Insert User</button>
            </form>



@endsection