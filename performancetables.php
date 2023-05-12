<?php
include 'emg_admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAYER PERFROMACE</title>
</head>
<body>
<div class="container" style="padding: 50px;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Goals</th>
      <th scope="col">Assists</th>
      <th scope="col">Gender</th>
      <th scope="col">Shirtnumber</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
$stmt = $db->runQuery("SELECT * FROM fileupload ORDER  BY goals DESC ");
$stmt->execute();
while($rows = $stmt->fetch()){
    $id = $rows['id'];
    $fname = $rows['name'];
    $lname = $rows['lname'];
    $goals = $rows['goals'];
    $assists = $rows['assists'];
    $position = $rows['position'];
    $shirtnumber = $rows['shirtnumber'];

    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$fname.'</td>
    <td>'.$lname.'</td>
    <td>'.$goals.'</td>
    <td>'.$assists.'</td>
    <td>'.$position.'</td>
    <td>'.$shirtnumber.'</td>
    <td>
<a href="details.php?id='.$id.'" class = "btn btn-primary">VIEW PROFILE</a>

</td>
  </tr>';

}
?>

</body>
</html>