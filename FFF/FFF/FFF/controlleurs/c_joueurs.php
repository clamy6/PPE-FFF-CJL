<?php
if ($_SESSION['connexion'] == TRUE){
    if (isset($_REQUEST['gestion'])){
        $gestion=$_REQUEST['gestion'];
    }
    else{
        $gestion="voirjoueurs";
    }

    switch ($gestion){

        //voir TOUS les joueurs
        case "voirjoueurs":{
            $lesJoueurs = $pdo->getLesJoueurs();
            include("vues/v_joueurs.php");
            break;
        }

        //Voir un joueur en particulier via l'id
        case "vuejoueurs":{
            $id = $_REQUEST['id'];
            $leJoueur = $pdo->getLeJoueur($id);
            $histoJou = $pdo->getHistoriqueJoueur($id);
            include("vues/v_vuejoueurs.php");
            break;
        }

        //Supprimer le joueur selectionné (il y aura une fenêtre de confirmation)
        case "suprjoueur":{
            $id = $_REQUEST['id'];

            $adieulejoueur = $pdo->deleteLeJoueur($id);
            include("vues/v_suprjoueur.php");
            break;
        }

        /*Les deux case suivant ont été utilisé afin de permettre la
         * Création d'un joueur. Le premier affiche tous les champs text
         * a remplir, le second envoie les informations puis les soumet
         * a la requete qui permet donc la création du joueur. La 2e requete
         * présente dans le 2nd case servira à renvoyer des infos pour
         * faire une petite fiche récapitulative de ce que l'on a mis dans
         * la bdd.
        */
        case "ajouterjoueur":{
           $lesCateg = $pdo->getLesCateg();
           $lesClubs = $pdo->getLesClubs();
           include("vues/v_ajouterjoueur.php");
           break;
        }

        case "creationjoueur":{
            $addjoueur = $pdo->ajouterJoueur($_POST['num'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail'], $_POST['datenaiss'], $_POST['NomCat'], $_POST['NomClub']);
            $leNouveauJoueur = $pdo->getLeNouveauJoueur($_POST['nom'], $_POST['prenom']);
            $leClubDuNouveau = $pdo->getLeNomClubNvJou($_POST['nom'], $_POST['prenom']);
            $laCategDuNouveau = $pdo->getLeNomCatNvJou($_POST['nom'], $_POST['prenom']);
            include("vues/v_creationjoueur.php");
            break;
        }

        /*
         * De même que pour la création, nous avons ici utilisés deux cases.
         * La toute première requête permet de renvoyer les values et
         * permet donc à l'utilisateur de pouvoir modifier directement
         * les anciennes informations (hors catégorie/club malheureusement)
         * du joueur (gain éventuel de temps).
         * La "vraie" modification a donc lieu lors du 2e case.
         */
        case "modifjoueur":{
            $id = $_REQUEST['id'];

            $leJoueur=$pdo->getLeJoueur($id);
            $lesClubs=$pdo->getLesClubs();
            $lesCateg=$pdo->getLesCateg();
            include("vues/v_modifjoueur.php");
            break;
        }

        case "modificationjoueur":{
            $id = $_REQUEST['id'];
            $modifLeJoueur = $pdo->modifJoueur($id, $_POST['nom'], $_POST['prenom'], $_POST['datenaiss'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail'], $_POST['NomClub'], $_POST['NumJou'], $_POST['NomCat']);
            include("vues/v_modificationjoueur.php");
            break;
        }



    }
}