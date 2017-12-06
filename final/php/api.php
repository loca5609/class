<?php
include "../../dbConn.php";


$sql = "SELECT id, avg(price) as avgPrice FROM accessories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);



?>