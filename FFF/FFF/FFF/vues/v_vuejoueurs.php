<!-- Affichage d'une page regroupant toutes les infos sur le joueur selectionné sur la gauche.
     A droite apparaitra un tableau regroupant la liste des inscriptions enregistrées pour
     ce joueur par le passé. Si ce joueur n'a jamais été inscrit nul part, un message
     d'erreur apparaîtra.
 -->

<div id="vue2">
    <div id="divception">

        <?php echo "<img src='".$leJoueur['imgJou']."'>"; ?> </br>
        <?php echo "Joueur n°".$leJoueur['NumJou']; ?> </br>
        <?php echo $leJoueur['NomJou']." ".$leJoueur['PrenomJou']; ?> </br>
        <!--<?php echo $leJoueur['NumClub']." dans la catégorie ".$leJoueur['NumCat']; ?> </br>-->
        <?php echo "Né le ".$leJoueur['Date_NaissJou']; ?> </br>
        </br>
        <?php echo $leJoueur['AdresseJou']; ?> </br>
        <?php echo $leJoueur['CPJou']." ".$leJoueur['VilleJou']; ?> </br>
        <?php echo $leJoueur['TelJou']; ?> </br>


        </br></br><a href="index.php?uc=admin&action=joueurs&gestion=voirjoueurs">Retour à la liste des joueurs.</a>
    </div>
    <div id="divceptionleretour">
        <!--<font color="red">NYI (pas entièrement)</font>
        </br>
        *img club*
        Joue pour le club xxx dans la catégorie yyy / Ou pas en fait-->
        <?php
        if(!empty($histoJou)){
            echo "<table border=1 style=border-collapse:collapse>";
            echo "<tr><td>Nom Club</td><td>Date Début Inscription</td><td>Date Fin Inscription</td></tr>";

            for($i=0;$i<count($histoJou);$i++){
                /* Ne fonctionne pas
                if(empty($histoJou['DateFinIns'])){
                    $histoJou['DateFinIns']=" / ";
                }*/
                echo "<tr><td>".$histoJou[$i]['NomClub']."</td><td>".$histoJou[$i]['DateDebutIns']."</td><td>".$histoJou[$i]['DateFinIns']."</td></tr>";
            }

            echo "</table>";
        }else{
            echo "Erreur / Le joueur n'a pas été inscrit dans un club auparavant.";
        }
        ?>



        <?php //echo var_dump(get_defined_vars()); ?>

    </div>
</div>