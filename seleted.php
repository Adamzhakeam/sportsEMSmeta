<?php
 include 'emg_admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECTED PLAYERS</title>
</head>
<body>
<?php
$stmt=$db->runQuery("SELECT * FROM teamselect");
$stmt->execute();
while($rows=$stmt->fetch()):
    $x = $rows['shirtnumber'];


endwhile;
echo $x;
?> 
</body>
</html>