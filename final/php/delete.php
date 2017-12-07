<?php
include "../../dbConn.php";


$sql = "DELETE from game WHERE id = :id";
$namedParameters = array();
$namedParameters[':id'] = $_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);





?>