<?php
    ob_start();
?>

    <!-- Affichage de la liste des acteurs -->
    <div class="tableau">
        <table>
            <thead>
                <th colspan="3">LISTE DES ACTEURS</th>
            </thead>
            <tbody>
                <tr class="titreColonnes">
                    <td>Nom complet</td>
                    <td>Sexe</td>
                    <td>Date de naissance</td>
                </tr>
                <?php
                    $i = 1;
                    foreach($requete->fetchAll() as $acteur){
                ?>
                    <tr class="ligne">
                        <td>
                            <a href="index.php?action=detailsActeur&id=<?= $i ?>" class="lienListe"><?= $acteur["prenom"] . " " . $acteur ["nom"] ?></a>
                        </td>
                        <td>
                            <?= $acteur["sexe"] ?>
                        </td>
                        <td>
                            <?= $acteur["date_naissance"] ?>
                        </td>
                    </tr>
                
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <a href="index.php?action=pageAjouterActeur" class="bouton">+</a>
    </div>

<?php
    $titre = "Liste des acteurs";
    $contenu = ob_get_clean();
    require("view/template.php");
?>