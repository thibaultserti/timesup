<?php

include("libs/maLibSQL.pdo.php");

$data = array(); 
$data["messages"] = array(); 


$SQL = "";


//$data["messages"] = parcoursRs(SQLSelect($SQL)); 

echo json_encode($data);


?>





