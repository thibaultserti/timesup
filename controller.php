<?php

session_start();

include_once "libs/maLibUtils.php";
include_once "libs/maLibSecurisation.php"; 
include_once "libs/model.php";

$qs = "";

if ($action = valider("action"))
{
	ob_start();

	switch($action)
	{	
		case 'Play':
			// TODO chopper l'avatar
			if ($pseudo = valider("pseudo")) {
				$_SESSION['userId'] = createUser($pseudo, "dog");
				if (!($_SESSION['gameId'] = valider("gameId"))) {
					$_SESSION['gameId'] = randomGameId();
				}
				setUserGameId($_SESSION['userId'], $_SESSION['gameId']);
				if (hasStarted($_SESSION['gameId'])) {
					$qs = "?view=game";
				} else {
					$qs = "?view=setup";
				}
			} else {
				$qs = "";
			}
		break;

		case 'Create':
			// TODO chopper l'avatar
			if ($pseudo = valider("pseudo")) {
				$_SESSION['userId'] = createUser($pseudo, "dog");
				$_SESSION['gameId'] = createGame($_SESSION['userId']);
				setUserGameId($_SESSION['userId'], $_SESSION['gameId']);
				$qs = "?view=setup";
			} else {
				$qs = "";
			}			
		break;

		case 'SetupAndPlay':
			if (($category = valider("category"))
				&&($maxPoints = valider("maxPoints"))
				&&($maxTime = valider("maxTime"))
			) {
				updateGame($category, $maxPoints, $maxTime, $_SESSION['gameId']);
				$qs = "?view=game";
			} else {
				$qs = "";
			}
		break;
	}
}

$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";

header("Location:" . $urlBase . $qs);

ob_end_flush();
	
?>