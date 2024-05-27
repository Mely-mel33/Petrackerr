<!-- resources/views/layout/app.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    @include('partials.navbar')

    @include('partials.sidebar')


    @yield('content')
    @yield('scripts')

</body>
</html>
