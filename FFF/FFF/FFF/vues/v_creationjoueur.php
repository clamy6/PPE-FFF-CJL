<!-- Petite fiche récapitulative du joueur tout juste créé -->

<div id="pannelcenter">
    Données enregistrées !
    <br>
    Ce nouveau joueur a été ajouté :
    <br>

    <?php echo "<img src='".$leNouveauJoueur['imgJou']."'>"; ?> </br>
    <?php echo "Joueur n°".$leNouveauJoueur['NumJou']; ?> </br>
    <?php echo $leNouveauJoueur['NomJou']." ".$leNouveauJoueur['PrenomJou']; ?> </br>
    <?php echo "Joue dans le club '".$leClubDuNouveau['NomClub']."' <br>dans la catégorie ".$laCategDuNouveau['NomCat']; ?> </br>
    <?php echo "Né le ".$leNouveauJoueur['Date_NaissJou']; ?> </br>
    <?php echo $leNouveauJoueur['AdresseJou']; ?> </br>
    <?php echo $leNouveauJoueur['CPJou']." ".$leNouveauJoueur['VilleJou']; ?> </br>
    <?php echo $leNouveauJoueur['TelJou']; ?> </br>
    <?php echo $leNouveauJoueur['MailJou']; ?> </br>


    </br></br><a href="index.php?uc=admin&action=joueurs&gestion=voirjoueurs">Retour à la liste des joueurs.</a>
</div>

</div>