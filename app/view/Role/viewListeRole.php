<?php
    ob_start();
?>

    <!-- Affichage de la liste des rôles -->
    <div class="tableau">
        <table>
            <thead>
                <th>LISTE DES RÔLES</th>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($requete->fetchAll() as $role){
                ?>
                    <tr>
                        <td><a href="index.php?action=detailsRole&id=<?= $i ?>" class="lienListe"><?= $role["nom_role"] ?></a></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <a href="index.php?action=pageAjouterRole" class="bouton">+</a>
    </div>

<?php
    $titre = "Liste des rôles";
    $contenu = ob_get_clean();
    require("view/template.php");
?>