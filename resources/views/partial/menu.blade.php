<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">

            @isset($meni)
                @foreach($meni as $m)
                    <li>

                        @if($m->menuName=='Login')
                            @if(!session('user'))
                                <a href="{{asset('/')}}{{$m->href}}">{{$m->menuName}}</a>
                            @endif

                            @elseif($m->menuName=='Register')
                                @if(!session('user'))
                                    <a href="{{asset('/')}}{{$m->href}}">{{$m->menuName}}</a>
                                @endif

                        @elseif($m->menuName=='Logout')
                                @if(session('user'))
                                    <a href="{{asset('/')}}{{$m->href}}">{{$m->menuName}}</a>
                                @endif

                        @elseif($m->menuName=='admin Panel')
                            @if(session('user') && session('user')->nameRole == 'admin')
                                <a href="{{asset('/')}}{{$m->href}}">{{$m->menuName}}</a>
                            @endif
                         @else
                        <a href="{{asset('/')}}{{$m->href}}">{{$m->menuName}}</a>
                            @endif

                    </li>
                @endforeach
            @endisset


        </ul>
    </div>
</nav>
</header>