<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <title>Gestion véto</title>
</head>
<body>
    @extends('layout.appadmin')

    @section('contenu')
   <main class="main container" id="main">
      <h1>admin</h1>
      <table>
        <thead>
            <tr>
                <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                <th> email <span class="icon-arrow">&UpArrow;</span></th>
                <th> Nom&&prenom <span class="icon-arrow">&UpArrow;</span></th>
                <th> Location cabinet  <span class="icon-arrow">&UpArrow;</span></th>
                <th> Decision <span class="icon-arrow">&UpArrow;</span></th>
                    
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1 </td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
               
            </tr>
            <tr>
                <td> 2 </td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
             
            </tr>
           
            <tr>
                <td> 4</td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
               
            </tr>
            <tr>
                <td> 5</td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
                
            </tr>
            <tr>
                <td> 6</td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
               
            </tr>
            <tr>
                <td> 7</td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
            </tr>
            <tr>
                <td> 8</td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
                
            </tr>
            <tr>
                <td> 9</td>
                <td>mely @gmail.com</td>
                <td> mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
               
            </tr>
            <tr>
                <td> 9</td>
                <td>mely @gmail.com</td>
                <td>mely </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
               
            </tr>
           
            <tr>
                <td> 11</td>
                <td>mely @gmail.com</td>
                <td> nora </td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
                
            </tr>
            <tr>
                <td> 11</td>
                <td>mely@gmail.com</td>
                <td> Sara</td>
               
                <td> rue charas.alger </td>
               
                <td>
                    <button class="accepter "> accepter </button>
                    <button class="refuser "> refuser  </button>
                </td>
            
            </tr>
        </tbody>
    </table>
      
   </main>
   @endsection
   <!-- MAIN Js-->
   <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/adminvt.js') }}"></script>
</body>
</html>