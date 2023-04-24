<?php
    /* Ajout de tout les contrôleurs */
    use Controller\AccueilController;
    use Controller\FilmController;
    use Controller\ActeurController;
    use Controller\RealisateurController;
    use Controller\RoleController;
    use Controller\GenreController;

    spl_autoload_register(function($class_name){
        include $class_name . '.php';
    });

    /* Création des objets contrôleurs */
    $ctrlAccueil = new AccueilController();
    $ctrlFilm = new FilmController();
    $ctrlActeur = new ActeurController();
    $ctrlRealisateur = new RealisateurController();
    $ctrlRole = new RoleController();
    $ctrlGenre = new GenreController();

    /* Si on a une action définie */
    if(isset($_GET['action'])){
        /* On effectue un switch sur celle-ci */
        switch($_GET['action']){
            /* Action pour les films */
            case "listerFilms": // lister les films
                $ctrlFilm->listerFilms();
                break;
            case "detailsFilm": // détails d'un film
                $ctrlFilm->detailsFilm();
                break;
            
            case "pageAjouterFilm": // aller à la page pour ajouter un film
                $ctrlFilm->pageAjouterFilm();
                break;

            case "ajouterFilm": // ajouter un film
                $ctrlFilm->ajouterFilm();
                break;
            
            case "pageAjouterCasting": // aller à la page pour ajouter un acteur au casting
                $ctrlFilm->pageAjouterCasting();
                break;

            /* Action pour les acteurs */
            case "listerActeurs": // lister les acteurs
                $ctrlActeur->listerActeurs();
                break;

            case "detailsActeur": // détails d'un acteur
                $ctrlActeur->detailsActeur();
                break;
            
            case "pageAjouterActeur": // aller à la page pour ajouter un acteur
                $ctrlActeur->pageAjouterActeur();
                break;

            case "ajouterActeur": // ajouter un acteur
                $ctrlActeur->ajouterActeur();
                break;    
            
            /* Action pour les réalisateurs */
            case "listerRealisateurs": // lister les réalisateurs
                $ctrlRealisateur->listerRealisateurs();
                break;
            
            case "detailsRealisateur": // détails d'un réalisateur
                $ctrlRealisateur->detailsRealisateur();
                break;
            
            case "pageAjouterRealisateur": // aller à la page pour ajouter un réalisateur
                $ctrlRealisateur->pageAjouterRealisateur();
                break;
                
            case "ajouterRealisateur": // ajouter un réalisateur
                $ctrlRealisateur->ajouterRealisateur();
                break;

            /* Action pour les rôles */
            case "listerRoles": // lister les rôles
                $ctrlRole->listerRoles();
                break;
            
            case "detailsRole": // détails d'un rôle
                $ctrlRole->detailsRole();
                break;
            
            case "pageAjouterRole": // aller à la page pour ajouter un rôle
                $ctrlRole->pageAjouterRole();
                break;

            case "ajouterRole": // ajouter un rôle
                $ctrlRole->ajouterRole();
                break;

            /* Action pour les genres */
            case "listerGenres": // lister les genres
                $ctrlGenre->listerGenres();
                break;
            
            case "detailsGenre": // détails d'un genre
                $ctrlGenre->detailsGenre();
                break;
            
            case "pageAjouterGenre": // aller à la page pour ajouter un genre
                $ctrlGenre->pageAjouterGenre();
                break;
            
            case "ajouterGenre": // ajouter un genre
                $ctrlGenre->AjouterGenre();
                break;
        }
    }
    else{ // Sinon cela veut dire qu'on va à l'acceuil
        $ctrlAccueil->allerAccueil();
    }
?>