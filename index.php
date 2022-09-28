<?php

require_once "send_via_mailer.php";

if (!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $conn = mysqli_connect("localhost", "root", "", "contactform_database") or die("Connection Error: " . mysqli_error($conn));
    $stmt = $conn->prepare("INSERT INTO contact (contact_name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param('sss',$name,$email,$message);
    $stmt->execute();
    $message = "Votre message a bien été envoyé.";
    $type = "success";
    $stmt->close();
    $conn->close();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Guillaume Boquet Coach Sportif</title>
</head>
<body>
    <!--Header-->
    <header class="header" id="header">

    <!--Navbar-->
    <div class="navbar" id="navbar">
        <div class="container flex">
            <h1 class="logo">GB Coaching.</h1>

            <nav>
                <ul>
                    <li><a href="/index.php">Accueil</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="coaching.html">Coaching en salle</a></li>
                </ul>


                <button class="nav-toggler">
                    <span></span>
                </button>
            </nav>

        </div>
    </div>

    <!--Showcase-->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <h1>Repoussez vos limites</h1>
                <p>Des programmes sportifs adaptés à tous les niveaux que vous soyez débutant ou confirmé. 
                    <!-- Quel que soit où vous en êtes, il y a toujours une marche de progression. -->
                </p>
                <a href="#rates" class="btn">En savoir plus</a>
            </div>
       

            <div class="showcase-form card">
                <h2>Essayez un programme</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-control">
                        <input  type="text" name="name" placeholder="Nom" required>
                    </div>
                    <div class="form-control">
                        <input  type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-control">
                        <textarea type="text" name="message" placeholder="Votre demande" rows="6" required></textarea>
                    </div>
                    <input type="submit" value="Envoyer" name="send" class="btn btn-primary btn-outline">
                </form>
            </div>
        </div>
    </section>
    </header>
    <!--Main-->
   <main id="main">
        <div class="wrapper-section">
            <div class="container">
                <h1 class="margin">Un objectif : un programme</h1>
                <section class="presentation flex flex-reverse">
                    <div class="image margin">
                        <img src="assets/images/guillaume_grey.jpg" alt="guillaume presentation">
                    </div>
                    <p class="margin">
                        Perte de poids, tonification, forme, santé, bien-être etc. Quels que soient vos objectifs sportifs, je vous accompagnerai pour vous aider à les atteindre.
                        Coaching en salle, en extérieur, à domicile, en visio... Vous choisissez le format qui vous convient en solo ou à plusieurs.<br>
                        En plus du coaching classique je propose différents services qui accélèreront vos résultats tels que les week-ends sportifs en Normandie et les séances vidéos sportives à thème (cardio, caf, souplesse, etc...) à faire en salle et/ou chez soi.
                    </p>
                </section>
            </div>
        </div>
        <div class="wrapper-section" id="rates">
            <div class="container">
                <h1 class="margin">Les tarifs</h1>
                <p class="margin">Vous choisissez le jour, l'heure et le lieu de la séance</p>
                <section class="presentation" id="section-price">
                    <div class="image margin">
                        <img src="assets/images/exercice.JPG" alt="sport collectif">
                    </div>
                    <ul class="flex">
                        <li>Solo - 60€/h</li>
                        <li>Duo - 30€/h par personne</li>
                        <li>Trio - 20€/h par personne</li>
                        <li>Quatre - 15€/h par personne</li>
                        <li>Cinq - 12€/h par personne</li>
                        <li>Six - 10€/h par personne</li>
                    </ul>
                </section>
            </div>
        </div>
        <div class="wrapper-section">
            <div class="grid">
                <div class="wrapper-presentation">
                    <div class="flex-column">
                        <h1 class="margin">Week-end sportif en Normandie</h1>
                        <p class="margin text-center">Venez vous dépensez et vous ressourcez dans une ambiance conviviale à deux heures de Paris</p>
                        <button class="btn btn-primary btn-outline" id="btn-desktop"> Découvrir le programme </button>
                        <div id="weekend-presentation">
                            <div class="flex-column">
                                <p class="text-center">Organisation de week-ends sportifs en Normandie de dépassement physique et mental</p>
                                <p class="text-center">Au programme :</p>
                                <ul class="text-center">
                                    <li>Samedi matin entraînement en salle sur Paris</li>
                                    <li>Samedi après midi randonnée 30 km falaises du Tréport et de Mers les Bains</li>
                                    <li>Dimanche matin randonnée 15 km Bois de Cise plage d'Ault</li>
                                </ul>
                            </div>
                            <i class="fa-solid fa-arrow-left-long fa-3x" id="arrow-weekend"></i>
                        </div>
                    </div>
                </div>
                <section class="presentation w-100" id="section-weekend">
                        <div id="wrapper-image">
                            <img src="assets/images/plage_people.jpg" alt="bord de plage" class="fade h-100" id="weekend-image">
                        </div>
                        <button class="btn btn-primary btn-outline" id="btn-mobile"> Découvrir le programme </button>
                </section>
            </div>
        </div>
    </main>

    <footer>
        <div id="footer">
            <div class="contact">
                <i class="fa-solid fa-mobile fa-2x">:<span>06.59.29.70.87</span></i>
                <i class="fa-solid fa-at fa-2x">:<span>guillaume.boquet@gmail.com</span></i>
            </div>
            <div class="legal-part">
                <p><a href="mentions_legales.html">Mentions légales</a></p>
                <p>© Guillaume Boquet</p>
            </div>
         </div>
        <p> <i>Site réalisé par Gautier FENAUX </i></p>
    </footer>



    <script src="index.js"></script>
</body>
</html>