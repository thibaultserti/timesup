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
if(array_key_exists("task",$_GET)){
    $task = $_GET['task'];
}

if($task=='write'){
    postMessage();
} else {
    getMessages();
}

function getMessages(){
    global $db;
    $results = $db ->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10");
    $messages = $results -> fetchAll();
    echo json_encode($messages);
}

function postMessage(){
    
    global $db;

    if(!array_key_exists("pseudo",$_POST) || !array_key_exists("message",$_POST)){
        echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
        return;

    }
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $q = $db -> prepare("INSERT INTO messages SET pseudo = :pseudo, message = :message, created_at = NOW()");
    $q-> execute(array(
        "pseudo" => $pseudo,
        "message" => $message
    ));
    echo json_encode(["status" => "success"]);

}


?>
