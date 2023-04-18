/* a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur */
SELECT f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), "%H:%i") AS durée, p.prenom, p.nom
FROM film f, realisateur r, personne p
WHERE f.id_realisateur = r.id_realisateur
AND r.id_personne = p.id_personne
AND f.id_film = 2

/* b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court) */
SELECT f.id_film, f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), "%H:%i") AS durée
FROM film f
WHERE f.duree > 135
ORDER BY f.duree DESC

/* c. Liste des films d’un réalisateur (en précisant l’année de sortie) */
SELECT f.titre, f.annee_sortie
FROM personne p, realisateur r, film f
WHERE p.id_personne = r.id_personne
AND r.id_realisateur = f.id_realisateur
AND p.prenom = "Joss"
AND p.nom = "Whedon"

/* d. Nombre de films par genre (classés dans l’ordre décroissant) */
SELECT g.libelle, COUNT(f.id_film) AS nombre_film
FROM film f, posseder po, genre g
WHERE f.id_film = po.id_film
AND po.id_genre = g.id_genre
GROUP BY g.id_genre
ORDER BY nombre_film DESC

/* e. Nombre de films par réalisateur (classés dans l’ordre décroissant) */
SELECT p.prenom, p.nom, COUNT(f.id_film) AS nombre_film
FROM film f, realisateur r, personne p
WHERE f.id_realisateur = r.id_realisateur
AND r.id_personne = p.id_personne
GROUP BY p.id_personne
ORDER BY nombre_film DESC

/* f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe */


/* g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien) */


/* h. Listes des personnes qui sont à la fois acteurs et réalisateurs */


/* i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien) */


/* j. Nombre d’hommes et de femmes parmi les acteurs */ 


/* k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu) */


/* l. Acteurs ayant joué dans 3 films ou plus */
