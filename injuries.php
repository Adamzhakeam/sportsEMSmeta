<?php
include'emg_admin/config.php';
$stmt = $db->runQuery('SELECT * FROM fileupload');
$stmt->execute();
while($rows=$stmt->fetch()):
    $injuries = $rows['injuries'];

endwhile;
header('Content-Type: application/json');
echo json_encode($injuries);
?>