<?php

include_once "maLibUtils.php";	// Car on utilise la fonction valider()
include_once "model.php";	// Car on utilise la fonction connecterUtilisateur()

/**
 * @file login.php
 * Fichier contenant des fonctions de vérification de logins
 */

/**
 * Cette fonction vérifie si le login/passe passés en paramètre sont légaux
 * Elle stocke les informations sur la personne dans des variables de session : session_start doit avoir été appelé...
 * Infos à enregistrer : pseudo, idUser, heureConnexion, isAdmin
 * Elle enregistre l'état de la connexion dans une variable de session "connecte" = true
 * L'heure de connexion doit être stockée au format date("H:i:s") 
 * @pre login et passe ne doivent pas être vides
 * @param string $login
 * @param string $password
 * @return false ou true ; un effet de bord est la création de variables de session
 */
function verifUser($login,$password)
{
	// Utiliser la couche modele pour verifier les identifiants 
	// fonction verifUserBdd($login,$password)
	$id = verifUserBdd($login,$password); 
	// if (!$id) die("recu : faux"); 
	// else die("id recu : $id");

	if ($id) {
		// SI ils sont corrects, créer des variables de session 
		// pour se souvenir de l'identité de l'utilisateur 
		// pseudo, idUser, heureConnexion (format date("H:i:s")) , isAdmin
		// renvoyer vrai ou faux 	
		// NB session_start(); a été appelé au début du controleur 
		$_SESSION["pseudo"] = $login; 
		$_SESSION["idUser"] = $id; 
		$_SESSION["connecte"] = true;
		$_SESSION["heureConnexion"] = date("H:i:s"); 
		$_SESSION["isAdmin"] = isAdmin($id); 
		return true; 
	} else return false; 

}




/**
 * Fonction à placer au début de chaque page privée
 * Cette fonction redirige vers la page $urlBad en envoyant un message d'erreur 
	et arrête l'interprétation si l'utilisateur n'est pas connecté
 * Elle ne fait rien si l'utilisateur est connecté, et si $urlGood est faux
 * Elle redirige vers urlGood sinon
 */
function securiser($urlBad,$urlGood=false)
{

}

?>
