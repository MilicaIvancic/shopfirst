@extends('layouts.adminlayout')

@section('midadmin')
    <div> <a href="{{route('adminmenu.create')}}"> Insert menu </a></div>
    <div class="table-responsive-sm">
        <table class="table table-striped table table-hover table-primary">
            <thead>
            <tr>

                <th scope="col">idMenu</th>
                <th scope="col">href</th>
                <th scope="col">menu name</th>
                <th scope="col">updatee</th>
                <th scope="col">delete</th>


            </tr>
            </thead>
            <tbody id="menu">
            @foreach($menu as $u)
                <tr>

                    <td>{{$u->idMenu}}</td>
                    <td>{{$u->href}}</td>
                    <td>{{$u->menuName}}</td>

                    <td> <a href="{{route('adminmenu.edit' , ['adminuser' =>$u->idMenu])}}">
                            <i class="material-icons">update</i>
                        </a>
                    </td>
                    <td>

                        <a href="#" >

                            <i class="material-icons deleteMenu" data="{{$u->idMenu}}"> delete_forever</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row" data-aos="fade-up">

            {{ $menu->links() }}

        </div>
    </div>


@endsection
@section("scripts")

    <script src="{{asset('/')}}js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/')}}js/jquery-ui.js"></script>
    <script src="{{asset('/')}}js/deletemenu.js"></script>

@endsection