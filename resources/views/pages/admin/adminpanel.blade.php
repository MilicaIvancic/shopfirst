@extends('layouts.adminlayout')

@section('midadmin')

    <div class="table-responsive-sm">

        <div> <img src="{{asset('/')}}/images/milica.jpg" class="figure-img"/>

        <p>

            Moje ime je Milica Ivancic, student sam Visoke ICT skole, treca godina internet tehnologija.
            Za ovaj sajt je koriscen, jquery, php(Laravel), bootstrup, html, css
        </p>
        </div>

        <table class="table table-striped table table-hover table-primary">
            <thead>
            <tr>

                <th scope="col">idActivity</th>
                <th scope="col">user name</th>
                <th scope="col">email</th>
                <th scope="col">activity</th>


            </tr>
            </thead>
            <tbody>
            @foreach($activity as $u)
                <tr>

                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->activiti}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row" data-aos="fade-up">

            {{ $activity->links() }}

        </div>
    </div>
    @endsection