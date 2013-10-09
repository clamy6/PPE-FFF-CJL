<!-- Page de modification d'un joueur selectionné. Les champs seront remplis automatiquement
grâce à la requête appellée sur c_joueurs, et les informations placées au bons endroits via les "values"-->

<div id="pannel">
    <h4>Modification du joueur <?php echo $leJoueur['NomJou']." ".$leJoueur['PrenomJou']; ?> </h4>
    <form method="POST" name="modifj" action="index.php?uc=admin&action=joueurs&gestion=modificationjoueur">
        <table>
            <tr>
                <td>
                    Nom:
                </td>
                <td>
                    <input type="text" name="nom" value="<?php echo $leJoueur['NomJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Prénom:
                </td>
                <td>
                    <input type="text" name="prenom" value="<?php echo $leJoueur['PrenomJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Date naissance:
                </td>
                <td>
                    <input type="text" name="datenaiss" value="<?php echo $leJoueur['Date_NaissJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Adresse:
                </td>
                <td>
                    <input type="text" name="adresse" value="<?php echo $leJoueur['AdresseJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Code Postal:
                </td>
                <td>
                    <input type="text" name="cp" value="<?php echo $leJoueur['CPJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Ville:
                </td>
                <td>
                    <input type="text" name="ville" value="<?php echo $leJoueur['VilleJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Téléphone:
                </td>
                <td>
                    <input type="text" name="tel" value="<?php echo $leJoueur['TelJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Mail:
                </td>
                <td>
                    <input type="text" name="mail" value="<?php echo $leJoueur['MailJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Equipe joueur:
                </td>
                <td>
                    <select name="NomClub">
                        <?php for($i=0;$i<count($lesClubs);$i++){ ?>
                            <?php echo $lesClubs[$i]['NomClub']; ?>
                            <option value="<?php echo $lesClubs[$i]['NumClub']; ?>"><?php echo $lesClubs[$i]['NomClub']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    N° Joueur
                </td>
                <td>
                    <input type="text" name="NumJou" value="<?php echo $leJoueur['NumJou']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Catégorie :
                </td>
                <td>
                    <select name="NomCat">
                        <?php for($i=0;$i<count($lesCateg);$i++){ ?>
                            <?php echo $lesCateg[$i]['NomCat']; ?>
                            <option value="<?php echo $lesCateg[$i]['NumCat']; ?>"><?php echo $lesCateg[$i]['NomCat']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

        </table>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Valider">

    </form>

    <?php //echo var_dump(get_defined_vars()); ?>
</div