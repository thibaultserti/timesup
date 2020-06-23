<?php

include_once('./config.php');


function connexion_sql()
{
    global $BDD_host;
    global $BDD_password;
    global $BDD_base;
    global $BDD_user;    
    try
    {
        $bdd = new PDO('mysql:host=' . $BDD_host . ';dbname=' . $BDD_base, $BDD_user, $BDD_password);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}


// create user in database
function createUser($pseudo, $avatar)
{
    
}

// update the game room for an user
function enterGame($user_id, $game_id)
{
    
}

// undefine game room for an user
function leaveGame($user_id)
{
    
}

// give points earned to user
// TODO : control if the game ends
function givePoints($user_id)
{
    
}

// create a game room
function createRoom($manager_id,$points_max, $duration, $categorie)
{
    
}

// update which word is being played in a game
function updateWord($game_id, $word_id)
{
    
}

?>
