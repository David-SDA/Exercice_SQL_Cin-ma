<?php
    ob_start();
?>

    <div class="tableau">
        <table>
            <thead>
                <th colspan="6">LISTE DES FILMS</th>
            </thead>
            <tbody>
                <tr class="titreColonnes">
                    <td>Titre</td>
                    <td>Année de sortie</td>
                    <td>Durée</td>
                    <td>Synopsis</td>
                    <td>Note</td>
                    <td>Réalisateur</td>
                </tr>
                <?php
                    $i = 1;
                    foreach($requete->fetchAll() as $film){
                ?>
                    <tr class="ligne">
                        <td>
                            <a href="index.php?action=detailsFilm&id=<?= $i ?>" class="lienListe"><?= $film["titre"] ?></a>
                        </td>
                        <td>
                            <?= $film["annee_sortie"] ?>
                        </td>
                        <td>
                            <?= $film["duree"] ?>
                        </td>
                        <td>
                            <?php
                                if($film["synopsis"] == NULL)
                                {
                                    echo "Pas de synopsis";
                                }
                                else{
                                    echo $film["synopsis"];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($film["note"] == NULL)
                                {
                                    echo "Pas de note";
                                }
                                else{
                                    echo $film["note"];
                                }
                            ?>
                        </td>
                        <td>
                            <a href="#" class="lienListe"><?= $film["prenom"] . " " . $film["nom"] ?></a>
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