<?php
/*TO DO LIST
 *
 * Modif d'un club - CHECK
 *
 * Suppression + modif d'un joueur - CHECK
 *
 * Gestion des inscriptions - pas check.
 * Gestion de l'historique / joueur - CHECK
 * Gestion des catégories (voir liste de joueur / catégorie ) - SEMI CHECK
 *
 * Afficher le nom du club et de la catégorie sur la fiche joueur - DOUBLE CHECK
 * Afficher liste joueurs d'un club - PLUS QUE CHECK
 *
 */

session_start();
//echo var_dump('$_SESSION');
require_once("util/class.pdoFFF.php");
include("vues/v_entete.php") ;


if(!isset($_REQUEST['uc'])){
     $uc = 'accueil';
    header("location:index.php?uc=accueil");
}
else{
	$uc = $_REQUEST['uc'];
}

$pdo = PdoFFF::getPdoFFF();

if($uc=='accueil'){
    if(isset($_SESSION['connexion']) && $_SESSION['connexion']==TRUE){
    $uc='admin';
    }else{
        $uc="accueil";
    }
}



switch($uc)
{
    //Envoie sur accueil si non connecté, sinon redirige côté controlleur admin
	case 'accueil':
	{
			include("vues/v_accueil.php");
			break;
	}
    case 'admin':
    {
        include ("controlleurs/c_administrateur.php");
        break;
    }

    //Plus vraiment d'utilité pour le moment
    case 'error':{
        include("vues/v_error.php");
        break;
    }

    case 'deco':{
        include("vues/v_deco.php");
        break;
    }

}

//echo var_dump(get_defined_vars());

include("vues/v_pied.php") ;
?>

