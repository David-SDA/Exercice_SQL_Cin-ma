<?php
    ob_start();
?>

    <article class="info">
        <?php
            $film = $requeteFilm->fetch();
        ?>
        <h2><?= $film["titre"] . " (" . $film["annee_sortie"] . ")" ?></h2>
        <div class="details">
            <div class="detailsFilm">
                <h3>Détails :</h3>
                <p>Durée : <?= $film["duree"] ?></p>
                <p>
                    Note : 
                    <?php
                        if($film["note"] == NULL){
                            echo "Pas de note";
                        }
                        else{
                            echo $film["note"];
                        }
                    ?>
                </p>
                <p>
                    Genre : 
                    <?php
                        foreach($requeteGenre->fetchAll() as $genre){
                            echo $genre["libelle"] . " ";
                        }
                    ?>
                </p>
                <p>
                    Réalisateur : <?= $film["prenom"] . " " . $film["nom"] ?>
                </p>
            </div>
            <div class="affiche">
                <?php
                    if($film["affiche"] == NULL){
                        echo "Pas d'affiche";
                    }
                    else{
                        echo "<img src='". $film["affiche"] . "' alt=''>";
                    }
                ?>
            </div>
        </div>
        <h3>Synopsis</h3>
        <p>
            <?php
                if($film["synopsis"] == NULL){
                    echo "Pas de synopsis";
                }
                else{
                    echo $film["synopsis"];
                }
            ?>
        </p>
        <article>
            <h3>Casting</h3>
            <?php
                foreach($requeteActeur->fetchAll() as $acteur){
                    echo "<p>- " . $acteur["prenom"] . " " . $acteur["nom"] . " dans le rôle de " . $acteur["nom_role"] . "</p>";
                }
            ?>
        </article>
    </article>

<?php
    $titre = $film["titre"];
    $contenu = ob_get_clean();
    require("view/template.php");
?>