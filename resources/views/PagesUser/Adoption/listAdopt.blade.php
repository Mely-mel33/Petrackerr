<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/User.css" rel="stylesheet">

<title>Espace Adoption</title>
<style>
    .custom-img {
        height: 280px;
        object-fit: cover;
        width: 100%;
        padding: 10px;
        border-radius: 18px;
    }

    .card {
        width: 300px;
    }

    h1 {
        text-align: center;
        padding: 15px;
    }

    .card-body {
        text-align: center;
    }

    .btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 5px;
    }

    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 1000;
        transition: opacity 0.3s ease;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
        width: 100%;
    }

    .close-popup {
        cursor: pointer;
        margin-top: 20px;
    }

    #popup-image {
        max-width: 120px;
        max-height: 120px;
        border-radius: 50%;
        aspect-ratio: 1/1;
        overflow: hidden;
        border: 2px solid #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .typepet a {
        border-radius: 50%;
        background-color: #dad9d9;
        padding: 20px;
        margin: 0px 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
    }

    .typepet a:hover {
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
        background-color: #f1eaea;
    }

    .typepet {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        margin-bottom: 10px
    }

    .typepet span {
        padding: 20px
    }

    .typepet span h3 {
        display: block;
        margin-top: 25px;
        font-size: 14px;
    }

    .listadopt .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .listadopt .col-md-4 {
        flex: 0 0 calc(33.333% - 20px);
        margin-bottom: 20px;
    }
</style>
</head>
<body>
   @extends('layout.app')
@section('content')

   <div id="content-container" class="container">
    <div class="content">
        <div class="listadopt" style="border-radius:18px; padding:20px">
        @if(session('success'))
    <div class="alert alert-success text-center custom-alert">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger text-center custom-alert">{{ session('error') }}</div>
@endif
            <h1>Espace Adoption</h1>
            <div class="typepet justify-content-center">
                
                <span class="category" data-category="chat">
                    <a href="#"><img src="../images/icons/chat.png"></a>
                    <h3>Chat</h3>
                </span>
                <span class="category" data-category="chien">
                    <a href="#"><img src="../images/icons/chien.png"></a>
                    <h3>Chien</h3>
                </span>
                <span class="category" data-category="oiseau">
                    <a href="#"><img src="../images/icons/oiseau.png"></a>
                    <h3>Oiseau</h3>
                </span>
                <span class="category" data-category="autre">
                    <a href="#"><img src="../images/icons/patte.png"></a>
                    <h3>Autre</h3>
                </span>
            </div>

        <div class="row justify-content-center">
            @foreach ($animalsToAdopt as $animal)
            <div class="col-md-4">
                <div class="card">
               
                    <img src="{{ asset('uploads/Pets/' . $animal->Image) }}" class="card-img-top custom-img"
                        alt="{{ $animal->Nom }}">
                    <div class="card-body">

                        <h5 class="card-title">{{ $animal->Nom }}</h5>
                        <p class="card-text">{{ $animal->Espèce }}</p>
                        <p class="card-text">{{ $animal->Sexe }}</p>
                        <p class="card-text">Mis en adoption par : {{ $animal->user->name }}</p>
                        <a href="#" class="btn btn-primary adopt-btn" data-id="{{ $animal->id }}">Adopter</a>
                        <a href="#" class="btn btn-danger view-profile-btn" data-id="{{ $animal->id }}"
                            data-nom="{{ $animal->Nom }}"
                            data-image="{{ asset('uploads/Pets/' . $animal->Image) }}"
                            data-espece="{{ $animal->Espèce }}" data-race="{{ $animal->Race }}"
                            data-age="{{ $animal->Age }}" data-sexe="{{ $animal->Sexe }}"
                            data-description="{{ $animal->Description }}"
                            data-created_at="{{ $animal->created_at }}">Voir le profil</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<div id="popup" class="popup">
    <div class="popup-content">
        <h2 id="popup-title"></h2>
        <img id="popup-image" src="" alt="Animal Image" class="custom-img">
        <p id="popup-espece"></p>
        <p id="popup-race"></p>
        <p id="popup-age"></p>
        <p id="popup-sexe"></p>
        <p id="popup-description"></p>
        <p id="popup-created_at"></p>
        <div class="close-popup" onclick="togglePopup('popup', true)"><img style="width: 40px"
                src="{{ asset('images/icons/annuler.png') }}"></div>
    </div>
</div>
<!-- Formulaire Popup -->
<div id="adopt-popup" class="popup">
    <div class="popup-content">
        <h2>Adopter un animal</h2>

    <form id="adopt-form" method="POST">
        @csrf
        <input type="hidden" name="pet_id" id="pet_id">
        <div class="mb-3">
            <label for="full_name" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="full_name" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Numéro de téléphone</label>
            <input type="tel" class="form-control" id="phone" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary close-popup">Annuler</button>
    </form>
</div>
</div>
<script>
   function togglePopup(popupId, forceClose = false) {
    const popup = document.getElementById(popupId);
    const body = document.querySelector('body');

    if (forceClose) {
        popup.style.opacity = 0;
        setTimeout(() => {
            popup.style.display = 'none';
            body.classList.remove('popup-open');
        }, 300);
    } else {
        if (popup.style.display === 'flex') {
            popup.style.opacity = 0;
            setTimeout(() => {
                popup.style.display = 'none';
                body.classList.remove('popup-open');
            }, 300);
        } else {
            popup.style.display = 'flex';
            setTimeout(() => {
                popup.style.opacity = 1;
                body.classList.add('popup-open');
            }, 10);
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const popups = document.querySelectorAll('.popup');
    popups.forEach(popup => {
        popup.style.display = 'none';
        popup.style.opacity = 0;
    });
    document.querySelector('body').classList.remove('popup-open');

    document.querySelectorAll('.adopt-btn').forEach(button => {
        button.addEventListener('click', function () {
            const petId = this.dataset.id;
            document.getElementById('pet_id').value = petId;
            togglePopup('adopt-popup');
        });
    });

    document.querySelectorAll('.close-popup').forEach(button => {
        button.addEventListener('click', function () {
            togglePopup('adopt-popup', true);
        });
    });

    document.getElementById('adopt-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const petId = document.getElementById('pet_id').value;
        const fullName = document.getElementById('full_name').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;

        if (fullName && phone && address) {
            const url = `/adoption/${petId}`; // Ensure the URL is correct
            const redirectURL = '/adopdes';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    pet_id: petId,
                    full_name: fullName,
                    phone: phone,
                    address: address
                })
            })
              /* .then(response => response.json())
                .then(data => {
                if (data.success) {
                        alert(data.message);
                      togglePopup('adopt-popup', true);
                    } else {
                      alert(data.message);
                  }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('etes vous sure dadopter cet animal ');
                });*/
                .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('success-message').innerText = data.message;
                            document.getElementById('success-message').style.display = 'block';
                            setTimeout(() => {
                                document.getElementById('success-message').style.display = 'none';
                            }, 5000); // Masquer le message après 5 secondes
                            togglePopup('adopt-popup', true);
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('succes:', error);
                        alert('votre demande a ete envoye avec succes .');
                        window.location.href = redirectURL;  // Redirection après l'alerte
                    });
            
     
     
            }
           







    });                 

    document.querySelectorAll('.view-profile-btn').forEach(button => {
        button.addEventListener('click', function () {
            const nom = this.dataset.nom;
            const image = this.dataset.image;
            const espece = this.dataset.espece;
            const race = this.dataset.race;
            const age = this.dataset.age;
            const sexe = this.dataset.sexe;
            const description = this.dataset.description;
            const created_at = this.dataset.created_at;

            if (nom && image && espece && race && age && sexe && description && created_at) {
                document.getElementById('popup-title').innerText = `Profil de ${nom}`;
                document.getElementById('popup-image').src = image;
                document.getElementById('popup-espece').innerText = `Espèce: ${espece}`;
                document.getElementById('popup-race').innerText = `Race: ${race}`;
                document.getElementById('popup-age').innerText = `Age: ${age}`;
                document.getElementById('popup-sexe').innerText = `Sexe: ${sexe}`;
                document.getElementById('popup-description').innerText = description;
                document.getElementById('popup-created_at').innerText = `Date d'ajout: ${created_at}`;
                togglePopup('popup');
            }
        });
    });

    const categories = document.querySelectorAll('.category');
    categories.forEach(category => {
        category.addEventListener('click', function (event) {
            event.preventDefault();

            const categoryType = this.dataset.category;
            const allCards = document.querySelectorAll('.card');
            const cardContainer = document.querySelector('.row');

            allCards.forEach(card => {
                cardContainer.insertBefore(card, cardContainer.firstChild);
            });

            allCards.forEach(card => {
                card.style.display = '';
            });

            allCards.forEach(card => {
                const species = card.querySelector('.card-text:nth-child(2)').innerText.toLowerCase();

                if (categoryType !== 'tout' && species !== categoryType) {
                    card.style.display = 'none';
                }
            });
        });
    });
});

</script>

@endsection
</body>
</html>