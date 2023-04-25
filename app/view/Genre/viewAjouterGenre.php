<?php
    ob_start();
?>
    <!-- Formulaire d'ajout d'un genre -->
    <div class=formulaire>
        <h2>Ajouter un genre</h2>
        <form enctype='multipart/form-data' action="index.php?action=ajouterGenre" method="post">
            <label for="nom_genre">Nom du genre</label>
            <input type="text" name="nom_genre" id="nom_genre" required>
            <input type="submit" name="submitGenre" value="Ajouter le genre">
        </form>
    </div>

<?php
    $titre = "Ajouter un genre";
    $contenu = ob_get_clean();
    require("view/template.php");
?>