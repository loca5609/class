<?php
include "../dbConn.php";


$sql = "SELECT name, quantity FROM accessories";
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);



?>