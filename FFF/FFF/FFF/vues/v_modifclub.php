<!-- Page de modification d'un club selectionné. Les champs seront remplis automatiquement
grâce à la requête appellée sur c_club, et les informations placées au bons endroits via les "values"-->

<div id="pannel">
    <h4>Modification du club <?php echo $leClub['NomClub']; ?></h4>
    <?php $id = $_REQUEST['id']; ?>
    <img src="<?php echo $leClub[7]; ?>"></br>
        <form method="POST" name="modifC" action="index.php?uc=admin&action=club&gestion=modificationclub">
            <table>
                <tr>
                    <td>
                        Nom :
                    </td>
                    <td>
                        <input type="text" name="nom" value="<?php echo $leClub['NomClub']?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        Adresse :
                    </td>
                    <td>
                        <input type="text" name="adresse" value="<?php echo $leClub['AdresseClub']?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        Code Postal :
                    </td>
                    <td>
                        <input type="text" name="cp" value=<?php echo $leClub['CPClub']?>>
                    </td>
                </tr>

                <tr>
                    <td>
                        Ville :
                    </td>
                    <td>
                        <input type="text" name="ville" value="<?php echo $leClub['VilleClub']?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        Téléphone :
                    </td>
                    <td>
                        <input type="text" name="tel" value=<?php echo $leClub['TelClub']?>>
                    </td>
                </tr>

                <tr>
                    <td>
                        Mail :
                    </td>
                    <td>
                        <input type="text" name="mail" value="<?php echo $leClub['MailClub']?>">
                    </td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="ok" value="Valider">

        </form>

</div>