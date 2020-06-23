<?php

include_once("libs/maLibSQL.pdo.php");

function createGame() {
	return 10;
}

function updateGame($category, $maxPoints, $maxTime) {
	return;
}

function randomGameId() {
	return 1;
}

function getUserId($pseudo) {
	return 10;
}

function setUserGameId($userId, $gameId) {
	// reset les points aussi
	return;
}

function createUser($pseudo, $avatar) {
	return 11;
}

function inGameUserList($gameId) {
	//TODO
	$l = [["Erik", 2200, true, "pig"], ["Alvin", 2100, false, "dog"]];
	//
	$s = "";
	for ($i = 0; $i < count($l); $i++) {
		$s = $s . "<tr>";
		$s = $s . "		<td class=\"td-rank\">" . $i . "</td>";
		$s = $s . "		<td class=\"td-points\">" . $l[$i][0] . "<br>" . $l[$i][1] . "</td>";
		$s = $s . "		<td class=\"td-speak\">";
		if ($l[$i][2]) {
			$s = $s . "<img src=\"img/speaker.svg\" id=\"speaker\">";
		}
		$s = $s . "		</td>";
		$s = $s . "		<td class=\"td-avatar\"><img src=\"img/avatars/" . $l[$i][3] . ".svg\" class=\"avatar\"></td>";
		$s = $s . "</tr>";
	}
	return $s;
}

function inSetupUserList($gameId) {
	//TODO
	$l = [["dog", "Alvin"], ["deer", "Ashka"], ["panda", "Dergawi"], ["cat", "Erik"], ["horse", "Javisty"]];
	//
	$s = "";
	for ($i = 0; $i < count($l); $i++) {
		$s = $s . "<figure>";
		$s = $s . "		<img src=\"img/avatars/" . $l[$i][0] . ".svg\" class=\"avatar\">";
		$s = $s . "		<figcaption>" . $l[$i][1] . "</figcaption>";
		$s = $s . "</figure>";
	}
	return $s;
}

function endGame($gameId) {
	//Supprime tous les joueurs qui sont liés à la game puis supprime la game
	return;
}

?>
