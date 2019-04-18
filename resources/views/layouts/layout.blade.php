
@include('partial.head')

<script>
    let baseUrl='{{url('/')}}';
    let csrf='{{csrf_token()}}';
</script>
@include('partial.navbar')
@include('partial.menu')
@yield('mid')
@yield('collection')
@yield('ourOffer')
@yield('featureProducts')
@yield('bigSale')
@include('partial.footer')
@yield("scripts")