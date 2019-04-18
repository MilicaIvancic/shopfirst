@include('partial.admin.head')
<script>
    let baseUrl='{{url('/')}}';
    let csrf='{{csrf_token()}}';
</script>
@include('partial.admin.table')
@include('partial.admin.navbar')
@include('partial.admin.content')
@include('partial.admin.futer')
@yield('scripts')