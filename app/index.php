<?php
    /* Ajout de tout les contrôleurs */
    require_once("controller/AccueilController.php");
    require_once("controller/RoleController.php");
    require_once("controller/GenreController.php");

    /* Création des objets contrôleurs */
    $controleurAccueil = new AccueilController();
    $controleurRole = new RoleController();
    $controleurGenre = new GenreController();

    /* Si on a une action définie */
    if(isset($_GET['action'])){
        /* On effectue un switch sur celle-ci */
        switch($_GET['action']){
            /* Action pour les rôles */
            case "listerRoles": // lister les rôles
                $controleurRole->listerRoles();
                break;

            /* Action pour les genres */
            case "listerGenres": // lister les genres
                $controleurGenre->listerGenres();
                break;
            
            case "detailsGenre": // détails d'un genre
                $controleurGenre->detailsGenre();
                break;
        }
    }
    else{ // Sinon cela veut dire qu'on va à l'acceuil
        $controleurAccueil->allerAccueil();
    }
?>