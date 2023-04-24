<?php
    ob_start();
?>

    <div class="tableau">
        <table>
            <thead>
                <th colspan="3">LISTE DES RÉALISATEURS</th>
            </thead>
            <tbody>
                <tr class="titreColonnes">
                    <td>Nom complet</td>
                    <td>Sexe</td>
                    <td>Date de naissance</td>
                </tr>
                <?php
                    $i = 1;
                    foreach($requete->fetchAll() as $realisateur){
                ?>
                    <tr class="ligne">
                        <td>
                            <a href="index.php?action=detailsRealisateur&id=<?= $i ?>" class="lienListe"><?= $realisateur["prenom"] . " " . $realisateur ["nom"] ?></a>
                        </td>
                        <td>
                            <?= $realisateur["sexe"] ?>
                        </td>
                        <td>
                            <?= $realisateur["date_naissance"] ?>
                        </td>
                    </tr>
                
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
    $titre = "Liste des réalisateurs";
    $contenu = ob_get_clean();
    require("view/template.php");
?>