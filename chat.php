<?php
include_once "config.php";

// on se connecte à notre base de données
try
{
    $db = new PDO('mysql:host=localhost;dbname=chat', $BDD_user, $BDD_password);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$task ="list";
if(array_key_exists("task",$GET)){
    echo $_GET["task"];
}

if($task=="write"){
    postMessages();
} else {
    getMessages();
}

function getMessages(){
    global $db;
    $results = $db ->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10");
    $messages = $results -> fetchAll();
    echo json_encode($messages);
}

function postMessages(){
    global $db;

    if(!array_key_exists("pseudo",$_POST) || !array_key_exists("message",$_POST)){
        echo json_encode(["status" => "error"]);
        return;
    }
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $query = $db ->prepare("INSERT INTO messages SET pseudo = :pseudo, message = :message, created_at = NOW()");

    $query->execute([
        "pseudo" => $pseudo,
        "message" => $message
    ]);
    echo json_encode(["status" => "success"]);

}


?>
