<?php
/**
 * Revision ict 151 - gestionUtilisateur.php
 *version : ${VERSION}
 *Initial version by: Christnovie.KIALA-BI
 *Initial version created on : 19.06.2020
 *Time : 09:28
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="RentASnow - Accueil";
?>
<div>
    <form action="" >
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>city</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <?php
                foreach ($_GET['Clients'] as $item): ?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['surname']?></td>
                    <td><?=$item['city']?></td>
                    <td><input type="button" value="Edit"></td>
                    <td><input type="button" value="Delete"></td>
                </tr>
                <?php endforeach;?>
        </table>

    </form>
</div>


<?php
$contenu = ob_get_clean();
require "view/gabarit.php";
