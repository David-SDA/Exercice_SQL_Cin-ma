<?php
    ob_start();
?>

    <div class="tableau">
        <table>
            <thead>
                <th>LISTE DES GENRES</th>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($requete->fetchAll() as $genre){
                ?>
                    <tr>
                        <td><a href="index.php?action=detailsGenre&id=<?= $i ?>" class="lienListe"><?= $genre["libelle"] ?></a></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <a href="index.php?action=pageAjouterGenre" class="bouton">+</a>
    </div>

<?php
    $titre = "Liste des genres";
    $contenu = ob_get_clean();
    require("view/template.php");
?>