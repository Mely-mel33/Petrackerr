<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>Gestion User</title>
</head>
<body>
   

    @extends('layout.appadmin')

    @section('contenu')
   <main class="main container" id="main">
      <table>
        <thead>
            <tr>
                <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                <th> email <span class="icon-arrow">&UpArrow;</span></th>
                <th> Nom&&prenom <span class="icon-arrow">&UpArrow;</span></th>
               
                <th> Decision <span class="icon-arrow">&UpArrow;</span></th>
                    
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1 </td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
               
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="modifier "> modifier  </button>
                    <button class="refuser "> supprimer  </button>
                </td>
               
            </tr>
            <tr>
                <td> 2 </td>
                <td>nora@gmail.com</td>
                <td> nora</td>
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="modifier "> modifier  </button>
                    <button class="refuser "> supprimer  </button>
                </td>
               
            </tr>
        </tbody>
    </table>
      
   </main>
    @endsection
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/adminvt.js') }}"></script>

</body>
</html>