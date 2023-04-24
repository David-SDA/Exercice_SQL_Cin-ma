<?php
    ob_start();
?>

    <div class=formulaire>
        <h2>Ajouter un film</h2>
        <form enctype='multipart/form-data' action="index.php?action=ajouterFilm" method="post">
            <label for="titre" class="nomChamp">Titre* :</label>
            <input type="text" name="titre" id="titre" required>
            
            <label for="annee_sortie" class="nomChamp">Année de sortie* :</label>
            <input type="number" name="annee_sortie" id="annee_sortie" min="1800" max="2200" value="1800" required>

            <label for="duree" class="nomChamp">Durée (en minutes)* :</label>
            <input type="number" name="duree" id="duree" min="0" value="0" required>
            
            <label for="synopsis" class="nomChamp">Synopsis :</label>
            <input type="text" name="synopsis" id="synopsis">

            <label for="affiche" class="nomChamp">Affiche :</label>
            <input type="file" name="affiche" id="affiche">

            <label for="note" class="nomChamp">Note :</label>
            <input type="number" name="note" id="note" min="0" max ="20">

            <label for="realisateurFilm" class="nomChamp">Réalisateur* :</label>
            <select name="realisateurFilm" id="realisateurFilm" required>
                <?php
                    $i = 1;
                    foreach($requeteRealisateur->fetchAll() as $realisateur){
                ?>
                    <option value="<?= $i ?>"><?= $realisateur["prenom"] . " " . $realisateur["nom"] ?></option>
                <?php
                        $i++;
                    }
                ?>
            </select>
            
            <label for="genreFilm" class="nomChamp">Genre* :</label>
            <select name="genreFilm[]" id="genreFilm" multiple required>
            <?php
                $i = 1;
                foreach($requeteGenre->fetchAll() as $genre){
            ?>
                <option value="<?= $i ?>"><?= $genre["libelle"] ?></option>
            <?php
                    $i++;
                }
            ?>
            <input type="submit" name="submitActeur" value="Ajouter l'acteur">
        </form>
    </div>

<?php
    $titre = "Ajouter un film";
    $contenu = ob_get_clean();
    require("view/template.php");
?>