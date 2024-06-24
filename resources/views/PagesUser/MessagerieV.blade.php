<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/User.css" rel="stylesheet">
   
    <title>Messagerie</title>
</head>

<body>

    @extends('layout.appveto')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                    <!-- Conteneur pour le chat -->
                    <div id="app" class="chatifycontent">
                        <iframe src="{{ route('chatify') }}" frameborder="0" style="width:100%;height:600px;border-radius:18px;  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
                        "></iframe>
                    </div>
            </div>
        </div>
   <@endsection 
    <script src="{{ asset('./js/chatify/autosize.js') }}"></script>
    <script src="{{ asset('./js/chatify/code.js') }}"></script>
    <script src="{{ asset('./js/chatify/utils.js') }}"></script>
    <script src="{{ asset('./js/chatify/font.awesome.min.js') }}"></script>

   


</body>

</html>
