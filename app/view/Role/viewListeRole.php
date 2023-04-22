<?php
    ob_start();
?>

    <div class="tableau">
        <table>
            <thead>
                <th>LISTE DES RÔLES</th>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($roles as $role){
                ?>
                    <tr>
                        <td><a href="index.php" class="lienListe"><?= $role["nom_role"] ?></a></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>