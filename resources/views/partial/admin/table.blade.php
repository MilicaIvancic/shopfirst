<body>
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="{{asset('/')}}" class="simple-text logo-mini">
                Streatshop
            </a>
            <a href="#" class="simple-text logo-normal">
                Milica Ivančić
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">

                <li class="nav-item active  ">
                    <a class="nav-link" href="{{route('adminuser.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="{{route('adminproduct.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="{{route('adminmenu.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>menu</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">dashboard</i>
                        <p>category</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">dashboard</i>
                        <p>role</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">dashboard</i>
                        <p>size</p>
                    </a>
                </li>
                <!-- your sidebar here -->
            </ul>
        </div>
    </div>