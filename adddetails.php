<?php
include 'emg_admin/config.php';
$playerid = $_GET['id'];

$stmt = $db->runQuery("SELECT * FROM fileupload WHERE id = '$playerid'");
$stmt->execute();
while($rows=$stmt->fetch()):
    $shirt = $rows['shirtnumber'];
    $name = $rows['lname'];

    echo '<h1 style="color:crimson;"><center> ADD '.$name.'s MATCH PERFOMANCE DETAILS ';

endwhile;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="emg_admin/css/bootstrap.min.css" >
    <link rel="stylesheet" href="emg_admin/css/roykusemererwa.css" >

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD MATCH AND PLAYER DETAILS</title>
</head>

<h1><center>ADD PLAYER MATCH DETAILS</center></h1>

<body>
    <?php
    if(isset($_POST['submit'])){
        $shirtnumber = '';
         $goals = $assists = $versingteam = $fouls = $shirtnumber='';
        $shirtnumber = $_POST['shirtnumber'];
        $goals = $_POST['goals'];
        if(empty($_POST['goals'])){
            echo"this field is required ";
            exit();
        }
        $assists = $_POST['assists'];
        if(empty($_POST['assists'])){
            echo"this field required";
            exit();
        }
        $versingteam = $_POST['versingteam'];
        $injuries = $_POST['injuries'];
        $fouls = $_POST['fouls'];

        $INSERT = $db->runQuery("INSERT INTO matchday (assists, shirtnumber, goals, fouls, versingteam,injuries)
                                                    VALUES('$assists','$shirtnumber','$goals','$fouls','$versingteam','$injuries')");
        $INSERT->execute();

        $UPDATE = $db->runQuery("UPDATE fileupload  SET assists = assists+'$assists',goals = goals+'$goals' , fouls = '$fouls',injuries = injuries+$injuries WHERE shirtnumber = '$shirtnumber'");
        $UPDATE->execute();
        echo "<script> alert('successfuly added') 
            document.location.href = 'data.php';
            </script>";
    }
    ?>
    <div class="container">
        
            <div class="panel">
                <div class="panel-body">
                    
    
    <form action="" method="post">
  
        <div class="form-group col-md-4">
            
            <label for="\">ASSISTS</label>
         <input class="form-control" type="number" name="assists">
</div>

        <div class="form-group col-md-4">
         <label for="">SHIRTNUMBER</label>
         <input class="form-control"  value=" <?php echo $shirt ?>"  name="shirtnumber">
         </div>
         <div class="form-group col-md-4">
         <label for="">GOALS</label>
         <input class="form-control" type="number" name="goals">
         </div>
    
         <div class="form-group col-md-4">
        <label for="">FOULS</label>
    <br>
            <select class="form-control" name="fouls" >
                <option name="fouls" value="">FOULS</option>
                <option value="Yellowcard" >YELLOW CARD</option>
                <option value="2yellowcards" >2 YELLOW CARDS</option>
                <option value="Redcard" >RED CARD</option>
                <option value="NONE" >NONE</option>

            </select>
         </div>
         <div class="form-group col-md-4">
            <label >FOULS</lable>
         <select class="form-control" name="injuries">
            <option name="injuries" value="">INJURIES </option>
            <option value="1" >CODE 1</option>
            <option value="2">CODE 2</option>
            <option value="0">NONE</option>
</select>
</div>

</div>
         <div class="form-group col-md-8">
            <label for="">VERSING TEAM </label>
        
         <select class="form-control" name="versingteam" >
         <?php
         $stmt =$db->runQuery("SELECT * FROM leagueone");
         $stmt->execute();
         while($rows = $stmt->fetch()):
            ?>
            <option value="">SELECT A TEAM</option>
            <option ><?php echo $rows['team'];?></option>
            <?php
         endwhile;
         ?>
         </div>
         </select>
         <button class ="btn btn-success" name="submit">SUBMIT</button>
         <a href="data.php?id=''"  class="btn btn-primary">BACK</a>
    
    </form>
    </div>
    </div>
    </div>
    

</body>
</html>