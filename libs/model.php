<?php

include_once("libs/maLibSQL.pdo.php");

function generateToken() {
	//TODO
	return 1111;
}

function tokenToGameId($token) {
	$sql = "SELECT id FROM game WHERE token = '$token'";
	return parcoursRs(SQLSelect($sql));
}

function createGame($userId) {
	$token = generateToken();
	$sql = "INSERT INTO game (token) VALUES ('$token')";
    setValue_("User", "manager", 1, "id", $userId);
    return SQLInsert($sql);
}

function updateGame($category, $maxPoints, $maxTime, $gameId) {
	$sql = "UPDATE game SET 
			categorie = '$category',
			duration = '$maxTime',
			pointsLimit = '$maxPoints'
			WHERE id = '$gameId'";
	return SQLUpdate($sql);
}

function getTimer($gameId) {
	$sql = "SELECT duration FROM game WHERE id=$gameId";
	return parcoursRs(SQLSelect($sql));
}

function randomGameId() {
	$sql = "SELECT id FROM game ORDER BY RAND() LIMIT 1";
	return parcoursRs(SQLSelect($sql));
}

function setUserGameId($userId, $gameId) {
	$sql = "UPDATE User SET idGame  = '$gameId' WHERE id = '$userId'";
	setValue_("User", "points", 0, "id", $userId);
    return SQLUpdate($sql);
}

/**
 * True if the party has begun, False if it's still waiting for players
 * @return boolean
 */
function hasStarted($gameId) {
    $wordId = getValue_("game", "idWord", "id", $gameId);
    // if $word_id = NULL the game hasn't started yet
    return !(is_null($wordId));
}

function createUser($pseudo, $avatar) {
	$sql = "INSERT INTO User (pseudo, avatar, points, manager) VALUES ('$pseudo', '$avatar', '0', '0')";
    return SQLInsert($sql);
}

/**
 * Return all the players in a game
 */
function getPlayers($gameId) {
	// TODO variable pour savoir qui parle
    $sql = "SELECT pseudo, points, id, avatar FROM User WHERE idGame = '$gameId'";
    return parcoursRs(SQLSelect($sql));
}

function isTalking($gameId) {
	$sql = "SELECT playingUserId FROM game WHERE id = '$gameId'";
	return parcoursRs(SQLSelect($sql));
}

function inGameUserList($gameId) {
	$l = getPlayers($gameId);
	$s = "";
	$b = isTalking($gameId)[0]['playingUserId'];
	for ($i = 0; $i < count($l); $i++) {
		$s = $s . "<tr>";
		$s = $s . "		<td class=\"td-rank\">" . ($i+1) . "</td>";
		$s = $s . "		<td class=\"td-points\">" . $l[$i]['pseudo'] . "<br>" . $l[$i]['points'] . "</td>";
		$s = $s . "		<td class=\"td-speak\">";
		if ($b == $l[$i]['id']) {
			$s = $s . "<img src=\"img/speaker.svg\" id=\"speaker\">";
		}
		$s = $s . "		</td>";
		$s = $s . "		<td class=\"td-avatar\"><img src=\"img/avatars/" . $l[$i]['avatar'] . ".svg\" class=\"avatar\"></td>";
		$s = $s . "</tr>";
	}
	return $s;
}

function inSetupUserList($gameId) {
	//TODO
	$l = getPlayers($gameId); //[["dog", "Alvin"], ["deer", "Ashka"], ["panda", "Dergawi"], ["cat", "Erik"], ["horse", "Javisty"]];
	//
	$s = "";
	for ($i = 0; $i < count($l); $i++) {
		$s = $s . "<figure>";
		$s = $s . "		<img src=\"img/avatars/" . $l[$i]['avatar'] . ".svg\" class=\"avatar\">";
		$s = $s . "		<figcaption>" . $l[$i]['pseudo'] . "</figcaption>";
		$s = $s . "</figure>";
	}
	return $s;
}

function endGame($gameId) {
	//Supprime tous les joueurs qui sont liés à la game puis supprime la game
	return;
}

/**
 * Get the (unique !) value from $table.$column where $column_cond = $value_cond
 */
function getValue_($table, $column, $column_cond, $value_cond)
{
    $sql = "SELECT $column FROM $table WHERE $column_cond = $value_cond";
	//die($sql);
    return SQLGetChamp($sql);
}

/**
 * Set the value from $table.$column where $column_cond = $value_cond on $value
 */
function setValue_($table, $column, $value, $column_cond, $value_cond)
{
    $sql = "UPDATE $table SET $column = $value WHERE $column_cond = $value_cond";
    return SQLUpdate($sql);
}

?>
