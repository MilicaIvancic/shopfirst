<body>

<div class="site-wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" placeholder="Search">
                        </form>
                    </div>

                    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="{{asset('/')}}" class="js-logo-clone">Street Shop</a>
                        </div>
                        <div class="site-logo">
                            @if(session('message'))
                                <div class="text-success">{{ session('message') }} </div>
                            @endif
                                @if(session('error'))
                                    <div class="text-danger">{{ session('error') }} </div>
                                @endif
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                @if(session('user'))
                                    <li><a href="{{asset('/')}}userCardFinished/{{session('user')->idUser}}"><span class="icon icon-person"></span></a></li>
                                @endif

                                <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                <li>
                                    <a href="{{asset('/')}}card" class="site-cart">
                                        <span class="icon icon-shopping_cart"></span>
                                        <span class="count">2</span>
                                    </a>
                                </li>
                                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>