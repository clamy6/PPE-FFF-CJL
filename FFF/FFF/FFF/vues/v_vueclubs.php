<!-- Affichage d'une page regroupant toutes les infos sur le club selectionné sur la gauche.
     A droite apparaitra la liste des joueurs inscrits dans ce club (qui auraient du être triés
     par catégorie)
 -->

<div id="vue2">
    <div id="divception">

   <img src="<?php echo $leClub[7]; ?>"></br>
    <?php echo $leClub[1]; ?> </br>
    <?php echo $leClub['AdresseClub'];?></br>
    <?php echo $leClub['CPClub']." ".$leClub['VilleClub']; ?>
    </br>
    <?php echo "Tel: ".$leClub['TelClub']."</br>Mail: ".$leClub['MailClub']; ?>
    </br></br><a href="index.php?uc=admin&action=club&gestion=voirclubs">Retour à la liste des clubs.</a>
    </div>
    <div id="divceptionleretour">
      Liste de joueurs inscrit dans le club:</br>

        <table border=1 style=border-collapse:collapse >
            <tr><td>N°</td> <td>NOM</td><td>Prénom</td></tr>
        <?php
        for($i=0;$i<count($lesJoueurs);$i++){
            echo "<tr><td> ".$lesJoueurs[$i]['NumJou']."</td><td> ".$lesJoueurs[$i]['NomJou']."</td><td> ".$lesJoueurs[$i]['PrenomJou']."</td></td>";
        }
        ?>
        </table>
        <?php //echo var_dump(get_defined_vars()); ?>



    </div>
</div>



