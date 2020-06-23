<?php

session_start();

include_once "libs/maLibUtils.php";
include_once "libs/model.php";

include("template/header.php");

$view = valider("view");

if (!$view) $view = "lobby";

if (file_exists("template/$view.php"))
	include("template/$view.php");
else {
	include("template/notFound.php");
}

include("template/footer.php");

?>
