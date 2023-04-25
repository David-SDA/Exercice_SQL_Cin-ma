<?php
    ob_start();
?>

    <!-- Formulaire d'association entre un acteur, un rôle et un film -->
    <div class=formulaire>
        <h2>Ajouter d'un acteur à un casting</h2>
        <form enctype='multipart/form-data' action="index.php?action=ajouterCasting" method="post">
            <label for="film" class="nomChamp">Film* :</label>
            <select name="film" id="film" required>
                <?php
                    $i = 1;
                    foreach($requeteFilm->fetchAll() as $film){
                ?>
                    <option value="<?= $i ?>"><?= $film["titre"]?></option>
                <?php
                        $i++;
                    }
                ?>
            </select>
            
            <label for="acteur" class="nomChamp">Acteur* :</label>
            <select name="acteur" id="acteur" required>
                <?php
                    $i = 1;
                    foreach($requeteActeur->fetchAll() as $acteur){
                ?>
                    <option value="<?= $i ?>"><?= $acteur["prenom"] . " " . $acteur["nom"] ?></option>
                <?php
                        $i++;
                    }
                ?>
            </select>

            <label for="role" class="nomChamp">Rôle* :</label>
            <select name="role" id="role" required>
                <?php
                    $i = 1;
                    foreach($requeteRole->fetchAll() as $role){
                ?>
                    <option value="<?= $i ?>"><?= $role["nom_role"] ?></option>
                <?php
                        $i++;
                    }
                ?>
            </select>
            
            <input type="submit" name="submitCasting" value="Ajouter le casting">
        </form>
    </div>

<?php
    $titre = "Ajouter un casting";
    $contenu = ob_get_clean();
    require("view/template.php");
?>