<?php
    if (isset($_REQUEST['action'])){
        $action=$_REQUEST['action'];
    }
    else{
        $action="connexion";
    }
    //echo var_dump($_REQUEST);
    //echo var_dump($_POST);

    switch ($action) {
        case "connexion":
        {
            if (isset($_POST['login']) && (isset($_POST['pass']))) {
                $log=$_POST['login'];
                $mdp=$_POST['pass'];

                //Test pour pouvoir se connecter
                $resu = $pdo->testLogAdmin($log, $mdp);

                if ($resu[0] == 0){
                    header("Location: index.php?uc=accueil&action=connexion");
                }else{
                    $_SESSION['connexion'] = TRUE;
                    $resu = $pdo->getNomAdmin($log);
                    include("vues/v_header_admin.php");
                    include("vues/v_accueiladmin.php");
                }
            }
            else {
            //si c'est cassé, redirection vers l'accueil
                include("vues/v_accueil.php");
            }
            break;
        }

        case "club":
        {
            //redirection vers le controlleur club
            include("vues/v_header_admin.php");
            include("controlleurs/c_club.php");

            //header("Location: index.php?uc=admin&action=club&gestion=voirclubs");
            break;
        }

        case "joueurs" :
        {
            //recirection vers le controlleur joueurs
            include("vues/v_header_admin.php");
            include("controlleurs/c_joueurs.php");
            break;
        }
}