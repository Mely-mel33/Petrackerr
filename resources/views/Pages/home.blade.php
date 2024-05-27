<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">


    <!-- Importer le fichier CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Importer le fichier JS -->
    <script src="{{ asset('./js/scroll.js') }}"></script>



    <title>Home</title>
</head>

<body>
    <div class="navbar-container shadow-lg">
        <nav class="navbar navbar-expand-lg  ">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="./images/logo.png" class="logo img-fluid" alt="petracker">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#top">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="#section_5"
                                id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Actualités</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="news.html">Adoption</a></li>
                                <li><a class="dropdown-item" href="news-detail.html">Sauvetage</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Nos services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="Animalerie.html">Animalerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Donation</a>
                        </li>

                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="{{ route('login') }}">Se
                                connecter</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn"
                                href="{{ route('register') }}">S'inscrire</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!--------------Espace Alertes----------------------->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="ss-nav" id="ssnv">
                <a href="#" class="alrtbtn">
                    <h6>Alerte</h6>
                </a>
                <p id="alertText">
                    @if (isset($alertes) && $alertes->count() > 0)
                        @foreach ($alertes as $alerte)
                            <span class="alerte-message">{{ $alerte->message }}</span>
                        @endforeach
                    @else
                        <span>Aucune alerte pour le moment</span>
                    @endif
                </p>
            </div>
        </nav>
    </div>


    <div class="banner-space"></div>
    <section class="banner-all">
        <div class="banner">
            <h1>Bienvenue sur Petracker</h1>
            <p>Votre plateforme dédiée au sauvetage et à l'adoption des animaux de compagnie.<br>
                Ensemble, changeons la vie de nos précieux compagnons! </p>
                <br>
            <a class=" btn1" href="{{ url('/login') }}">Se connecter</a>

        </div>
    </section>


    <!----------------------Section des publications------------------------------->

    <section class="publications-section">
        <div class="container">
            <h2 class="section-title">Dernières publications</h2>
            <div class="publications-container">
                <!-- Ici seront affichées les publications -->

            </div>
        </div>
    </section>


    <!--------------------------Section services--------------------------------->

    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Nos services</h2>
            <div class="services-container">

                <div class="service-card">
                    <div class="service-image">
                        <img src="images/adoption.jpg" alt="Service Adoption">
                    </div>
                    <div class="service-info">
                        <h3 class="service-title">Service d'Adoption</h3>
                        <p class="service-description">Trouvez votre compagnon idéal parmi nos animaux disponibles à
                            l'adoption.</p>
                        <a href="#" class="btn">En savoir plus</a>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="images/sauvetage.jpg" alt="Service Sauvetage">
                    </div>
                    <div class="service-info">
                        <h3 class="service-title">Service de Sauvetage</h3>
                        <p class="service-description">Participez à nos efforts de sauvetage et aidez-nous à protéger
                            les animaux en détresse.</p>
                        <a href="#" class="btn">En savoir plus</a>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="images/véto.jpg" alt="Service Consultation Vétérinaire">
                    </div>
                    <div class="service-info">
                        <h3 class="service-title">Consultation Vétérinaire en Ligne</h3>
                        <p class="service-description">Obtenez des conseils et des consultations vétérinaires en ligne
                            pour la santé de votre animal.</p>
                        <a href="#" class="btn">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!----------------------- Section Donation----------------------------->

    <section class="donation-section">
        <div class="donation-container">
            <div class="donation-image">
                <img src="images/donate.jpg" alt="Faites une donation">
            </div>
            <div class="donation-info">
                <h2>Faites une donation</h2>
                <p>Votre générosité nous aide à sauver plus d'animaux et à leur fournir des soins de qualité.</p>
                <form>
                    <div class="form-group">
                        <label for="donationAmount">Montant de la donation (en DA)</label>
                        <input type="text" id="donationAmount" class="form-control" placeholder="Ex: 1000">
                    </div>
                    <div class="form-group">
                        <label for="donationName">Votre nom complet</label>
                        <input type="text" id="donationName" class="form-control" placeholder="Ex: Prénom Nom">
                    </div>
                    <div class="form-group">
                        <label for="donationEmail">Votre adresse email</label>
                        <input type="email" id="donationEmail" class="form-control"
                            placeholder="Ex: example@example.com">
                    </div>
                    <button type="submit" class="btn-donation">Faire une donation</button>
                </form>
            </div>
        </div>
    </section>
    <!------------------------------Footer------------------->
    <footer>
        <div class="container-footer-all">
            <div class="container-body">
                <div class="colum1">
                    <h1>Nos informations</h1>
                    <p>Lorem ipsum blabla</p>
                </div>

                <div class="colum2">
                    <h1>Réseaux Sociaux</h1>
                    <div class="row1">
                        <img src="./images/icons/facebook.png">
                        <label>Nous suivre sur Facebook</label>
                    </div>

                    <div class="row1">
                        <img src="./images/icons/instagram.png">
                        <label>Nous suivre sur Instagram</label>

                    </div>

                </div>

                <div class="colum3">

                    <h1>Nous Contacter</h1>

                    <div class="row2">
                        <img src="./images/icons/house.png">
                        <label>Bejaia,Algéria</label>
                    </div>

                    <div class="row2">
                        <img src="./images/icons/smartphone.png">
                        <label>+1-829-395-2064</label>
                    </div>

                    <div class="row2">
                        <img src="./images/icons/contact.png">
                        <label>petracker3317@gmail.com</label>
                    </div>

                </div>

            </div>

        </div>

        <div class="container-footer">
            <div class="footer">
                <div class="copyright">
                    © 2024 tous droits réservés | <a href="">Petracker</a>
                </div>
                <div class="information">
                    <a href="">Privatisation et politique</a> | <a href="">Termes et conditions</a>
                </div>
            </div>
        </div>

    </footer>

    <!--Scripts JS-->

    <script src="./js/services.js"></script>
    <script src="./js/publis.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertTextElement = document.getElementById('alertText');
            const alerts = [];

            @if (isset($alertes) && $alertes->count() > 0)
                @foreach ($alertes as $alerte)
                    alerts.push("{{ $alerte->message }}");
                @endforeach
            @endif

            let currentAlertIndex = 0;

            function changeAlert() {
                if (alerts.length > 0) {
                    alertTextElement.textContent = alerts[currentAlertIndex];
                    currentAlertIndex = (currentAlertIndex + 1) % alerts.length;
                }
            }

            setInterval(changeAlert, 6000); // Change d'alerte toutes les 6 secondes
            changeAlert(); // Affiche la première alerte immédiatement
        });
    </script>


</body>

</html>
