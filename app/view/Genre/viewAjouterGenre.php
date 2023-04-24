<?php
    ob_start();
?>

    <div class=formulaire>
        <h2>Ajouter un genre</h2>
        <form action="">
            <label for="nom_genre">Nom du genre</label>
            <input type="text" name="nom_genre" id="nom_genre" required>
            <input type="submit" value="Ajouter le genre">
        </form>
    </div>

<?php
    $titre = "Ajouter un genre";
    $contenu = ob_get_clean();
    require("view/template.php");
?>