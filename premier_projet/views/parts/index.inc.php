<!-- Vérifie si un paramètre GET est défini et sa valeur afin d'envoyer la bonne erreur -->
<?php if (isset($_GET["erreur"]) && $_GET["erreur"] === "infos_absentes") : ?>
    <p style="color: red;">
        Veuillez remplir tous les champs !
    </p>
<?php endif; ?>

<?php if (isset($_GET["erreur"]) && $_GET["erreur"] === "echec_envoie_infos") : ?>
    <p style="color: red;">
        Une erreur est survenue. Veuillez réessayer.
    </p>
<?php endif; ?>
    
<?php if (isset($_GET["erreur"]) && $_GET["erreur"] === "nom_invalide") : ?>
    <p style="color: red;">
         Veuillez écrire votre nom et nom de famille
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_envoie_infos"])) : ?>
    <p style="color: lightgreen;">
        Vos informations ont bien été enregistrées !
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_requises"])) : ?>
    <p style="color: red;">
        Veuillez entrer vos informations.
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_invalides"])) : ?>
    <p style="color: red;">
        Vos informations sont invalides.
    </p>
<?php endif; ?>
