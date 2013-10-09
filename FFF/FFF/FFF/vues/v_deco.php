<?php
    $_SESSION['connexion'] = FALSE;

    session_start ();
    
    session_unset ();
    
    session_destroy ();
    
    header('location: index.php?uc=accueil');
?>