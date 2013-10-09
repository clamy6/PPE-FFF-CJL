<!-- Affiche la liste des clubs inscrits dans la BDD via la boucle foreach ligne 8 -->

<div id="pannel">
    <form>
        <table>
    <?php
    //echo var_dump(get_defined_vars());
        foreach ($lesClubs as $unClub)
        {
            $nom = $unClub['NomClub'];
            $image = $unClub['imgClub'];
            $id= $unClub['NumClub'];
            ?>


            <tr>
                <td><a href="index.php?uc=admin&action=club&gestion=vueclubs&id=<?php echo $id; ?>"><img src="<?php echo $image; ?>"</a></td>
                <!--<td><input type="image" src="<?php //echo $image; ?>" value="submit"></td>-->
                <td><?php echo $nom; ?></a></td>
                <td><a href="index.php?uc=admin&action=club&gestion=modifclub&id=<?php echo $id; ?>"><img src="images/edit.png"</a></td>
                <td><a href="index.php?uc=admin&action=club&gestion=suprclub&id=<?php echo $id; ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce club?');"><img src="images/delete.png"></a></td>
            </tr>


        <?php
        }
    ?>
        </table>
</div>