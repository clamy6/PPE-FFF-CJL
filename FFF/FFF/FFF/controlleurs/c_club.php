<?php
    if ($_SESSION['connexion'] == TRUE){
    if (isset($_REQUEST['gestion'])){
    $gestion=$_REQUEST['gestion'];
    }
    else{
        $gestion="voirclubs";
    }

    switch ($gestion){

        //voir TOUS les clubs
        case "voirclubs":{
            $lesClubs = $pdo->getLesClubs();
            include("vues/v_clubs.php");
            break;
        }

        //Voir un club en particulier via l'id
        case "vueclubs":{
            $id = $_REQUEST['id'];

            $leClub = $pdo->getLeClub($id);
            $lesJoueurs = $pdo->getLesJoueursDuClub($id);
            include("vues/v_vueclubs.php");
            break;
        }

        //Supprimer le club selectionné (il y aura une fenêtre de confirmation)
        case "suprclub":{
            $id = $_REQUEST['id'];

            $adieuleclub = $pdo->deleteLeClub($id);
            include("vues/v_suprclub.php");
            break;
        }

        /*Les deux case suivant ont été utilisé afin de permettre la
        Création d'un club. Le premier affiche tous les champs text
        a remplir, le second envoie les informations puis les soumet
        a la requete qui permet donc la création du club. La 2e requete
        présente dans le 2nd case servira à renvoyer des infos pour
        faire une petite fiche récapitulative de ce que l'on a mis dans
        la bdd.
        */
        case "ajouterclub":{
            include("vues/v_ajouterclub.php");
            break;
        }

        case "creationclub":{
            $addClub = $pdo->ajouterClub($_POST['nom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail']);
            $leNouveauClub = $pdo->getLeNouveauClub($_POST['nom']);
            include("vues/v_creationclub.php");
            break;
        }

        /*
         * De même que pour la création, nous avons ici utilisés deux cases.
         * La toute première requête permet de renvoyer les values et
         * permet donc à l'utilisateur de pouvoir modifier directement
         * les anciennes informations du club (gain éventuel de temps).
         * La "vraie" modification a donc lieu lors du 2e case.
         */
        case "modifclub":{
            $id = $_REQUEST['id'];

            $leClub=$pdo->getLeClub($id);
            include("vues/v_modifclub.php");
            break;
        }

        case "modificationclub":{
            $id = $_REQUEST['id'];

            $modifLeClub = $pdo->modifClub($id, $_POST['nom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail']);
            include("vues/v_modificationclub.php");
            break;
        }

    }
}