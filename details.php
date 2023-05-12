<?php

include 'emg_admin/config.php';
$playerid = $_GET['id'] ;

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
    <title>PLAYERDETAILS</title>
</head>
<body>
  <h1><center>PLAYER PROFILE</center></h1>
<?php
    $stmt = $db->runQuery("SELECT * FROM fileupload WHERE id = '$playerid'");
    $stmt->execute();
    while($rows = $stmt->fetch()){
        $image = $rows['image'];
        $fname = $rows['name'];
        $lname = $rows['lname'];
        $id = $rows['id'];
        $position = $rows['position'];
        $age = $rows['age'];
        $gender = $rows['gender'];
        $goals = $rows['goals'];
        $fouls = $rows['fouls'];
        $assists = $rows['assists'];
        $shirtnumber = $rows['shirtnumber'];
        $injuries = $rows['injuries'];

        $dateOfBirth = $age;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));



        echo'
        <div class="container">
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/'.$image.'" class="img-fluid rounded-lg" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">FIRSTNAME:'.$fname.'</h5>
        <h5 class="card-title">SIRNAME:'.$lname.'</h5>
        <div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">AGE:'.$diff->format('%y').'</li>
    <li class="list-group-item">GENDER:'.$gender.'</li>
    <li class="list-group-item">SHIRTNUMBER:'.$shirtnumber.'</li>
    <li class="list-group-item">POSITION:'.$position.'</li>
    <li class="list-group-item">GOALS:'.$goals.'</li>
    <li class="list-group-item">ASSISTS:'.$assists.'</li>
    <li class="list-group-item">FOULS:'.$fouls.'</li>
    <li class="list-group-item">INJURIES:'.$injuries.'</li>
  </ul>
  <div class="card-footer">
    <a href="adddetails.php?id='.$id.'" class = "btn btn-secondary"> ADD MATCH PERFOMANCE  </a>
  </div>
</div>
      </div>
    </div>
  </div>
</div>
</div> 
        ';

        $stmt = $db->runQuery("SELECT * FROM matchday WHERE shirtnumber = '$shirtnumber'");
$stmt->execute();
while($rows = $stmt->fetch()){
  
  $goals = $rows['goals'];
  $fouls = $rows['fouls'];
  $assists = $rows['assists'];
  $versingteam = $rows['versingteam'];

  echo'
  <div class="container">
  <div class="card" style="width: 18rem; my-3">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">GOALS SCORED:'.$goals.'</li>
    <li class="list-group-item">ASSISTS:'.$assists.'</li>
    <li class="list-group-item">FOULS IN THE GAME:'.$fouls.'</li>
    <li class="list-group-item">TEAM PLAYED AGAINST:'.$versingteam.'</li>
  </ul>
  <div class="card-footer">
    <p style="color:blue; font-weight:bold;">PLAYER MATCH PERFOMANCE</p>
  </div>
</div>
</div>
<br>
';
  
  
}

    }
    
    

    ?>
      <a href="data.php" class = "btn btn-primary"> VIEW TEAM PLAYERS </a>
</body>
</html>