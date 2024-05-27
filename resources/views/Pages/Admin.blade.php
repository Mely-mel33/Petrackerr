<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/adminvt.js') }}"></script>
    <title>Document</title>
</head>

<body>

    @extends('layout.appadmin')

    @section('contenu')
    <main class="main container" id="main">
    </main>
    @endsection
</body>

</html>
