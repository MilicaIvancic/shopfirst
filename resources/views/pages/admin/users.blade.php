@extends('layouts.adminlayout')

@section('midadmin')
    <div> <a href="{{route('adminuser.create')}}"> Insert User </a></div>
    <div class="table-responsive-sm">
        <table class="table table-striped table table-hover table-primary">
            <thead>
            <tr>

                <th scope="col">idUser</th>
                <th scope="col">First name</th>
                <th scope="col">Surname</th>
                <th scope="col">e-mail</th>
                <th scope="col">idRole</th>
                <th scope="col">active</th>
                <th scope="col">address</th>
                <th scope="col">mobilephone</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
            <tr>

                <td>{{$u->idUser}}</td>
                <td>{{$u->userName}}</td>
                <td>{{$u->surname}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->idRole}}</td>
                <td>{{$u->active}}</td>
                <td>{{$u->address}}</td>
                <td>{{$u->mobileFone}}</td>
                <td> <a href="{{route('adminuser.edit' , ['adminuser' =>$u->idUser])}}">
                        <i class="material-icons">update</i>
                    </a>
                </td>
                <td>

                    <form action="{{route('adminuser.destroy' , ['adminuser' =>$u->idUser])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-primary btn-lg py-3 "><i class="material-icons">delete_forever</i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection