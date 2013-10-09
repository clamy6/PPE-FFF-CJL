<!-- Petite fiche récapitulative du club tout juste créé -->

<div id="pannelcenter">
    Données enregistrées !
    <br>
    Ce nouveau club a été ajouté :
    <br>
    <img src="<?php echo $leNouveauClub[7]; ?>"></br>
    <?php echo $leNouveauClub[1]; ?> </br>
    <?php echo $leNouveauClub['AdresseClub'];?></br>
    <?php echo $leNouveauClub['CPClub']." ".$leNouveauClub['VilleClub']; ?>
    </br>
    <?php echo "Tel: ".$leNouveauClub['TelClub']."</br>Mail: ".$leNouveauClub['MailClub']; ?>
    </br></br><a href="index.php?uc=admin&action=club&gestion=voirclubs">Retour à la liste des clubs.</a>
</div>

