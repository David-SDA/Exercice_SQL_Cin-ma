<?php
    ob_start();
?>

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
                    foreach($acteurs as $acteur){
                ?>
                    <tr class="ligne">
                        <td>
                            <a href="#" class="lienListe"><?= $acteur["prenom"] . " " . $acteur ["nom"] ?></a>
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
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>