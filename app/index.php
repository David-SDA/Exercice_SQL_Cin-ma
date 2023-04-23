<?php
    /* Ajout de tout les contrôleurs */
    require_once("controller/AccueilController.php");
    require_once("controller/FilmController.php");
    require_once("controller/ActeurController.php");
    require_once("controller/RealisateurController.php");
    require_once("controller/RoleController.php");
    require_once("controller/GenreController.php");

    /* Création des objets contrôleurs */
    $controleurAccueil = new AccueilController();
    $controleurFilm = new FilmController();
    $controleurActeur = new ActeurController();
    $controleurRealisateur = new RealisateurController();
    $controleurRole = new RoleController();
    $controleurGenre = new GenreController();

    /* Si on a une action définie */
    if(isset($_GET['action'])){
        /* On effectue un switch sur celle-ci */
        switch($_GET['action']){
            /* Action pour les films */
            case "listerFilms": // lister les films
                $controleurFilm->listerFilms();
                break;

            /* Action pour les acteurs */
            case "listerActeurs": // lister les acteurs
                $controleurActeur->listerActeurs();
                break;

            /* Action pour les réalisateurs */
            case "listerRealisateurs": // lister les réalisateurs
                $controleurRealisateur->listerRealisateurs();
                break;

            /* Action pour les rôles */
            case "listerRoles": // lister les rôles
                $controleurRole->listerRoles();
                break;
            
            case "detailsRole": // détails d'un rôle
                $controleurRole->detailsRole();
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