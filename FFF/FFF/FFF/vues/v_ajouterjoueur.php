<!--  Formulaire de création de joueur -->

<div id="pannel">
    <form method="POST" name="addj" action="index.php?uc=admin&action=joueurs&gestion=creationjoueur">
        <table>
            <tr>
                <td>
                    Nom:
                </td>
                <td>
                    <input type="text" name="nom">
                </td>
            </tr>

            <tr>
                <td>
                    Prénom:
                </td>
                <td>
                    <input type="text" name="prenom">
                </td>
            </tr>

            <tr>
                <td>
                    Date naissance:
                </td>
                <td>
                    <input type="text" name="datenaiss">
                </td>
            </tr>

            <tr>
                <td>
                    Adresse:
                </td>
                <td>
                    <input type="text" name="adresse">
                </td>
            </tr>

            <tr>
                <td>
                    Code Postal:
                </td>
                <td>
                    <input type="text" name="cp">
                </td>
            </tr>

            <tr>
                <td>
                    Ville:
                </td>
                <td>
                    <input type="text" name="ville">
                </td>
            </tr>

            <tr>
                <td>
                    Téléphone:
                </td>
                <td>
                    <input type="text" name="tel">
                </td>
            </tr>

            <tr>
                <td>
                    Mail:
                </td>
                <td>
                    <input type="text" name="mail">
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
                    <input type="text" name="num">
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

        <input type="submit" value="Valider">

    </form>

    <?php //echo var_dump(get_defined_vars()); ?>
</div