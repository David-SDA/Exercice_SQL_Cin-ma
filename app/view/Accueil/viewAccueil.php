<?php
    ob_start();
    $titre = "Accueil";
    $contenu = ob_get_clean();
    require("view/template.php");
?>