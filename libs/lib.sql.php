<?php

include_once("./maLibSQL.pdo.php");

// create user in database
function createUser($pseudo, $avatar)
{
    $sql = "INSERT INTO User (pseudo, avatar) VALUES ({$pseudo}, {$avatar})";
    return SQLInsert($sql);
}

// update the game room for an user
function enterGame($user_id, $game_id)
{
    $sql = "UPDATE User SET idGame = {$game_id} WHERE id = {$user_id}";
    return SQLUpdate($sql);
}

// undefine game room for an user
function leaveGame($user_id)
{
    $sql = "UPDATE User SET idGame = NULL WHERE id = {$user_id}";
    return SQLUpdate($sql);
}

/**
 * give points earned to user,
 * @return boolean|int true when game limit is exceeded, the new score elsewise
 */
function givePoints($user_id, $points)
{
    $current_score = getValue_("User", "points", "id", $user_id);
    if (!is_null($current_score)) {
        $new_score = $current_score + $points;
    } else {
        $new_score = $points;
    }
    $sql = "UPDATE User SET points = {$new_score} WHERE id = {$user_id}";
    SQLUpdate($sql);

    $game_id = getValue_("User", "idGame", "id", $user_id);
    $game_limit = getValue_("Game", "pointsLimit", "id", $game_id);

    if ($new_score >= $game_limit) {
        // game ends here
        return true;
    } else {
        return $new_score;
    }
}

// create a game room
function createRoom($manager_id,$points_max, $duration, $categorie, $token)
{
    $sql = "INSERT INTO Game (categorie, duration, pointsLimit, token)
            VALUES ('{$categorie}', {$duration}, {$points_max}, '{$token}')";
    $res = SQLInsert($sql);
    setValue_("User", "manager", 1, "id", $manager_id);
    return $res;
}

// update which word is being played in a game
function updateWord($game_id, $word_id)
{
    return setValue_("Game", "idWord", $word_id, "id", $game_id);
}

/**
 * Return all the players in a game
 * @return PDOStatement
 */
function getPlayers($game_id)
{
    $sql = "SELECT * FROM User WHERE idGame = {$game_id}";
    return SQLSelect($sql);
}

/**
 * True if the party has begun, False if it's still waiting for players
 * @return boolean
 */
function hasStarted($game_id)
{
    $word_id = getValue_("Game", "idWord", "id", $game_id);
    // if $word_id = NULL the game hasn't started yet
    return !(is_null($word_id));
}

/**
 * Delete row from $table (should be Game or User) where the id matches $id
 */
function deleteFromID($table, $id)
{
    $sql = "DELETE FROM {$table} WHERE id = {$id}";
    return SQLDelete($sql);
}

/**
 * Get the (unique !) value from $table.$column where $column_cond = $value_cond
 */
function getValue_($table, $column, $column_cond, $value_cond)
{
    $sql = "SELECT {$column} FROM {$table} WHERE {$column_cond} = {$value_cond}";
    return SQLGetChamp($sql);
}

/**
 * Set the value from $table.$column where $column_cond = $value_cond on $value
 */
function setValue_($table, $column, $value, $column_cond, $value_cond)
{
    $sql = "UPDATE {$table} SET {$column} = {$value} WHERE {$column_cond} = {$value_cond}";
    return SQLUpdate($sql);
}

?>
