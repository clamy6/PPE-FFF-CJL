<!-- Formulaire de création de club -->

<div id="pannel">
    <form method="POST" name="addc" action="index.php?uc=admin&action=club&gestion=creationclub">
        <table>
            <tr>
                <td>
                    Nom :
                </td>
                <td>
                    <input type="text" name="nom">
                </td>
            </tr>

            <tr>
                <td>
                    Adresse :
                </td>
                <td>
                    <input type="text" name="adresse">
                </td>
            </tr>

            <tr>
                <td>
                    Code Postal :
                </td>
                <td>
                    <input type="text" name="cp">
                </td>
            </tr>

            <tr>
                <td>
                    Ville :
                </td>
                <td>
                    <input type="text" name="ville">
                </td>
            </tr>

            <tr>
                <td>
                   Téléphone :
                </td>
                <td>
                    <input type="text" name="tel">
                </td>
            </tr>

            <tr>
                <td>
                    Mail :
                </td>
                <td>
                    <input type="text" name="mail">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="ok" value="Valider">

    </form>
</div>
