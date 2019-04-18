<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="site-logo">
            @if(session('message'))
            <div class="text-success">{{ session('message') }} </div>
        @endif
        @if(session('error'))
            <div class="text-danger">{{ session('error') }} </div>
        @endif
    </div>
        @yield('midadmin')
    </div>
</div>