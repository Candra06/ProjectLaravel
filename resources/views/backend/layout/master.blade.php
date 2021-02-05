<!DOCTYPE html>
<html lang="en">

@include('backend.layout.header')

<body>
    @include('backend.layout.navbar')
    @yield('content')
   @include('backend.layout.footer')
</body>
</html>
