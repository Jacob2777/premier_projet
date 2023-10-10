<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?php include_once("views/parts/head.inc.php"); ?>
</head>
<body class="principale">
    <header>
        <?php include_once("views/parts/header.php"); ?>
    </header>

    <div class="video">
        <video class="video" src="public/videos/video_pw.mp4" autoplay muted loop></video>
    </div>

    <div class="a_propos" id="a_propos">
        <h2>À propos de nous</h2>
        <div class="texte_a_propos">
            <div>Depuis ses débuts il y a 20 ans, Pub G4 s'est imposé comme une véritable référence en matière de découverte culinaire. Notre engagement à offrir des plats de tout genre avec une touche raffinée continue de ravir les palais les plus exigeants. Que vous soyez entre amis, en quête d'une soirée romantique ou simplement désireux de satisfaire vos papilles, Pub G4 demeure l'endroit idéal pour une expérience gastronomique mémorable.</div>

            <div>Notre cuisine unique et élégante vous emmène dans un véritable voyage culinaire, où chaque bouchée est un délice en soi. Nos chefs talentueux et passionnés ont soigneusement élaboré un menu varié, mettant en valeur des saveurs audacieuses et des combinaisons de goûts harmonieuses. De l'entrée au dessert, chaque plat est préparé avec une attention méticuleuse aux détails, garantissant une expérience gustative inégalée.</div>

            <div>En accompagnement de nos plats exquis, nous vous proposons une sélection exceptionnelle de boissons. Que vous soyez amateur de vins fins, de cocktails créatifs ou de bières artisanales, notre carte des boissons saura combler toutes vos attentes. Notre équipe de sommeliers expérimentés se fera un plaisir de vous guider dans votre choix, vous permettant ainsi de découvrir de nouveaux accords et d'enrichir votre expérience chez Pub G4.</div>
        </div>
    </div>

    <div class="infolettre" id="infolettre">
        <?php
            // Inclusion du fichier d'erreurs en passant les paramètres GET
            $erreurs = array();
            if (isset($_GET["erreur"])) {
                $erreurs[] = $_GET["erreur"];
            }
            include("views/parts/index.inc.php");
        ?>
        <h2>Infolettre <span class="asterisque">*</span></h2>
        <div class="texte_infolettre">Abonnez-vous pour ne manquer aucune information et être à jour sur nos différentes promotions</div>
        <form class="formulaire" action="infolettre" method="POST">
            <label>
                <input type="text" placeholder="Nom complet" name="nom">
            </label>
            <label>
                <input type="email" placeholder="Courriel" name="courriel">
            </label>
            <button class="btn" type="submit">Envoyer</button>
        </form>
    </div>

    <div class="menu" id="menu">
        <h2>Découvrez nos plats savoureux !</h2>
        <div class="cases">
            <a href="menu?categorie=entrée">
                <div class="case entrees">Entrées</div>
            </a>
            <a href="menu?categorie=plat">
                <div class="case plats">Plats principaux</div>
            </a>
            <a href="menu?categorie=dessert">
                <div class="case desserts">Desserts</div>
            </a>
        </div>
    </div>

    <div class="joindre" id="joindre">
        <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.7465989466386!2d-74.0055905233061!3d45.776268412562374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20St%20Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sfr!2sca!4v1686589071499!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        <div class="infos">
            <h2>Le Pub G4</h2>
            <h3>Raffinement et Authenticité </h3>
            <div class="telephone">Téléphone: 450 436-1531</div>
            <div class="adresse">Adresse: 297, rue St-Georges, Saint-Jérôme (Québec) J7Z 5A2</div>
            <div class="liens_reseaux">
                <a class="lien_reseaux" href="#"><img src="public/img/Facebook.png" alt="logo Facebook"></a>
                <a class="lien_reseaux" href="#"><img src="public/img/Instagram.png" alt="logo Instagram"></a>
                <a class="lien_reseaux" href="#"><img src="public/img/Twitter.png" alt="logo Twitter"></a>
            </div>    
        </div>
    </div>

    <div class="container" id="avis"><span style="color: orange; font-size:60px;">*</span>
        <div class="avis">
            <img class="pdp" src="public/img/blank-profile-picture-g7db372fd6_640.png" alt="photo profile">
            <div class="commentaires">Une expérience agréable et un service de qualité, dommage que ce ne soit pas plus... proche!</div>
            <div class="etoiles">5 étoiles</div>
        </div>
        
        <div class="avis centre">
            <img class="pdp" src="public/img/blank-profile-picture-g7db372fd6_640.png" alt="photo profile">
            <div class="commentaires">Une expérience agréable et un service de qualité, dommage que ce ne soit pas plus... proche!</div>
            <div class="etoiles">5 étoiles</div>
        </div>
        
        <div class="avis">
            <img class="pdp" src="public/img/blank-profile-picture-g7db372fd6_640.png" alt="photo profile">
            <div class="commentaires">Une expérience agréable et un service de qualité, dommage que ce ne soit pas plus... proche!</div>
            <div class="etoiles">5 étoiles</div>
        </div>
    </div>

    <footer>
        <div class="img_footer"></div>
        <?php include_once("views/parts/footer.php"); ?>
    </footer>

    <script src="public/js/main.js"></script>
</body>
</html>