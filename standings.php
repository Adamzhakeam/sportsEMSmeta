<?php
include 'emg_admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="emg_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="emg_admin/css/roykusemererwa.css">
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE STANDINGS</title>
</head>
<body>

<br/><br/>
    <div class="container">
        <h2 class="page-header" style="font-weight:bolder;">Team Sheet</h2>
        
    
<div class="col-md-4">
        <div class="panel panel-default light-shadow">
            <div class="panel-body">
                <h3 class="page-header" style="margin-top:0px;">Enter Team Name</h3>
    <?php
if(isset($_POST['save'])){
    $team = $_POST['team'];
    $teamid=$_POST['teamid'];
    
    $INSERT = $db->runQuery("INSERT INTO leagueone (team,teamid)
                                        VALUES('$team','$teamid')");
    $INSERT->execute();
    ?>
    <p style="background:forestgreen;color:#fff;">
    &nbsp
    &nbsp
    Team Entered Successfully!
    &nbsp
    &nbsp
  </p>
    <?php
}
    ?>
  
    <form action="" method="post">


    <div class="form-group">
<label for="">TEAM NAME</label>
<input type="text" name="team" placeholder="team name" class="form-control">
</div>


<div class="form-group">
<label for="">TEAM ID</label>
<input type="text" name="teamid" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="save" style="width:100%;">SAVE</button>

    </form>
</div>
</div>





    <?php
if(isset($_POST['submit'])){
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $age = $_POST['Age'];
    $shirtnumber = $_POST['shirtnumber'];
    $position = $_POST['position'];
    $gender = $_POST['Gender'];

    $INSERT = $db->runQuery("INSERT INTO crudoperation (fname, lname, shirtnumber, age, gender, position)
                                                    VALUES('$fname','$lname','$shirtnumber','$age','$gender','$position')");
    $INSERT->execute();
}



?>
</div>





<div class="col-md-8">

<div class="panel panel-default light-shadow" style="height:270px;">
<div class="panel-body">
<form action=""  method="post">

<h3 class="page-header bold" style="margin-top:0px;">Enter Team Scores</h3>

<div class="form-group col-md-3">
<select name="hometeam" class="form-control">
<option value="">HOME TEAM</option>
<?php
$tt = $db->runQuery( "SELECT * FROM leagueone" );
$tt->execute();
while($rr = $tt->fetch()):
?>
<option><?php echo $rr['team']; ?></option>
<?php
endwhile;
?>
</select>
</div>


<div class="form-group col-md-2">
<input type="number" name="goalsfor" class="form-control" placeholder="Goals">
</div>


<div class="form-group col-md-3">
<select name="awayteam" class="form-control">
<option value="">AWAY TEAM</option>
<?php
$ttt = $db->runQuery( "SELECT * FROM leagueone" );
$ttt->execute();
while($rrr = $ttt->fetch()):
?>
<option><?php echo $rrr['team']; ?></option>
<?php
endwhile;
?>
</select>
</div>

<div class="form-group col-md-2">
<input type="number" name="goalsagainst" class="form-control" placeholder="Goals">
</div>



<br>
<input type="submit" name="add" class="btn btn-primary" style="width:100%;">
</form>
<?php
if(isset($_POST['add'])){
$hometeam = $_POST['hometeam'];
$goalsfor = $_POST['goalsfor'];
$goalsagainst = $_POST['goalsagainst'];
$awayteam = $_POST['awayteam'];

$homePoints = $process->deriveHomePoints($goalsfor,$goalsagainst,$hometeam);
$awaypoints = $process->deriveAwayPoints($goalsagainst,$goalsfor,$awayteam);



$INSERT=$db->runQuery("INSERT INTO matchestable (hometeam, goalsfor, homepoints, goalsagainst, awayteam, awaypoints)
                                        VALUES('$hometeam', '$goalsfor', '$homePoints', '$goalsagainst', '$awayteam', '$awaypoints')");
$INSERT->execute();

$process->updatePlayedGames($hometeam);
$process->updatePlayedGames($awayteam);
$process->updateWins1($goalsfor,$goalsagainst,$hometeam,$awayteam);
$process->updategoals($hometeam,$goalsfor,$awayteam);
$process->updategoals2($awayteam,$goalsagainst,$hometeam);
$process->extractgoaldifference($hometeam);
$process->extractgoaldifference($awayteam);




}
?>

<?php
$stmt = $db->runQuery("SELECT * FROM matchestable");
$stmt->execute();


while ($rows=$stmt->fetch()):



endwhile;
?>
</div>
</div>
</div>
</div>




<div class="container">
<div class="col-md-4">
  
<h3 class="page header">FIXTURE RESULTS</h3>
<table class="table table-bordered table-striped" style="width:80%;">
  <thead>
    <tr>
    
      <th scope="col">HOME TEAM</th>
      <th scope="col">SCORES</th>
      <th scope="col">AWAY TEAM</th>
      <th scope="col">SCORES</th>
    </tr>
  </thead>
  <tbody>
  <?php
$stmt = $db->runQuery("SELECT * FROM matchestable ");
$stmt->execute();
while($rows = $stmt->fetch()){
    $id = $rows['id'];
    $goalsfor1 = $rows['goalsfor'];
    $goalsagainst1 = $rows['goalsagainst'];
    
    $hometeam = $rows['hometeam'];
    $awayteam = $rows['awayteam'];

    echo '<tr>
    
    <td>'.$hometeam.'</td>
    <td>'.$goalsfor1.'</td>
    <td>'.$awayteam.'</td>
    <td>'.$goalsagainst1.'</td>
    <td>
    </td>
  </tr>';
/*<button name="update" class ="btn btn-primary"><a href="update.php?updateid='.$id.'"></a>UPDATE</button>
<button  name="delete" class ="btn btn-warning><a href="imageandtext.php?deleteid='.$id.'"></a>DELETE</button>*/


}
?>

  </tbody>
</table>
</div>











  <div class="col-md-8">
  <div class="panel panel-default light-shadow" style="margin-left:10%;">
  <div class="panel-body">

<h3 class="page header">TABLE STANDINGS</h3>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
    
      <th scope="col"> TEAMS</th>
      <th>P</th>
      <th>w</th>
      <th>l</th>
      <th>D</th>
      <th>F</th>
      <th>A</th>
      <th>GD</th>
      <th scope="col">PTS</th>
  </tr>
  </thead>
  <tbody>
  <?php
$stmt = $db->runQuery("SELECT * FROM leagueone ORDER BY points DESC ");
$stmt->execute();
while($rows = $stmt->fetch()){
    $id = $rows['team'];
    $goalsfor1 = $rows['playedgames'];
    $goalsagainst1 = $rows['wins'];
    
    $hometeam = $rows['loss'];
    $awayteam = $rows['draws'];
    $scrdf = $rows['scoredfor'];
    $scrda = $rows['scoredagainst'];
    $gd = $rows['goaldifference'];
    $pts = $rows['points'];

    echo '<tr>
    
    <td>'.$id.'</td>
    
    <td>'.$goalsfor1.'</td>
    
    <td>'.$goalsagainst1.'</td>
    
    <td>'.$hometeam.'</td>
    <td>'.$awayteam.'</td>
    <td>'.$scrdf.'</td>
    <td>'.$scrda.'</td>
    <td>'.$gd.'</td>
    <td>'.$pts.'</td>
    
  </tr>';
/*<button name="update" class ="btn btn-primary"><a href="update.php?updateid='.$id.'"></a>UPDATE</button>
<button  name="delete" class ="btn btn-warning><a href="imageandtext.php?deleteid='.$id.'"></a>DELETE</button>*/


}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>




</body>
</html>