<!-- Affiche tous les joueurs inscrits dans la bdd grâce à la boucle foreach ligne 8-->

<div id="vue">
    <form>
    <table>
    <?php
    //echo var_dump(get_defined_vars());
    foreach ($lesJoueurs as $unJoueur)
    {
        $nomJou = $unJoueur['NomJou'];
        $numJou = $unJoueur['NumJou'];
        $imgJou = $unJoueur['imgJou'];
        $prenomJou = $unJoueur['PrenomJou'];
        $numClub = $unJoueur['NumClub'];
        $id = $unJoueur['idJou'];


        ?>

        <!-- Nécéssaire de garder ces champs en hidden pour transmettre les valeurs d'une page à l'autre-->
        <INPUT type="hidden" name ="uc" value = "admin"/>
        <INPUT type="hidden" name ="action" value = "clubs">
        <INPUT type="hidden" name ="gestion" value = "voirjoueurs">
        <INPUT type="hidden" name ="idjoueur" value = "<?php echo $id; ?>">



            <tr>
                <td><a href="index.php?uc=admin&action=joueurs&gestion=vuejoueurs&id=<?php echo $id; ?>"><?php echo "<img src='".$imgJou."'>"; ?></a></td>
                <td><?php echo $nomJou; ?></td>
                <td><?php echo $prenomJou; ?></td>
                <td><a href="index.php?uc=admin&action=joueurs&gestion=modifjoueur&id=<?php echo $id; ?>"><img src="images/edit.png"</a></td>
                <td><a href="index.php?uc=admin&action=joueurs&gestion=suprjoueur&id=<?php echo $id; ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce joueur?');"><img src="images/delete.png"></a></td>
            </tr>

    <?php
    }
    ?>
    </table>
    </form>
</div>