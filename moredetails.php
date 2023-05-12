<?php
include 'emg_admin/config.php';
$playerID = $_GET['id'];

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
    <title>More Details</title>
</head>
<body>
    <div class="container">
    <form action="" method="post">
        <div class="row g-3">
            <div class="col">
                <label for="">GOALS</label>
                <input type="number" name="Goals" value="Goals" class="form-control">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col">
                <label for="">ASSISTS</label>
                <input type="number" name="Assists" value="Assists" class="form-control">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col">
                <label for="">FOULS</label>
                <input type="number" name="Fouls" value="Fouls" class="form-control">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col">
                <label for="">SHIRTNUMBER</label>
                <input type="number" name="shirtnumber" value="shirtnumber" class="form-control">
            </div>
        </div>
    
    <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
    </form>
    
    </div>
    <?php
    if(isset($_POST['submit'])){
        $Goals = $_POST['Goals'];
        $Fouls = $_POST['Fouls'];
        $Assists = $_POST['Assists'];
        $shirtnumber = $_POST['shirtnumber'];

        $INSERT = $db->runQuery("INSERT INTO moredetails (Goals, Fouls, Assists, shirtnumber)
                                                        VALUES(:Goals, :Fouls, :Assists, :shirtnumber)");
        $INSERT->bindValue(":Goals",$Goals);
        $INSERT->bindValue(":Fouls",$Fouls);
        $INSERT->bindValue(":Assists",$Assists);
        $INSERT->bindValue(":shirtnumber",$shirtnumber);
        $INSERT->execute();
    }
    ?>

    


</head>
<body>
<?php 
$stmt = $db->runquery("SELECT * FROM photoupload WHERE id = '$playerID'");

$stmt->execute(array());
$list=$stmt->fetchALL(PDO::FETCH_OBJ);
foreach($list as $list2){
    ?>
       
<div class="container">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <img src="uploads/<?php echo $list2->filename;?>" width="300px" class="img-fluid rounded-start" alt="...">
  <?php
$stmt = $db->runQuery("SELECT * FROM playerupload WHERE id = '$playerID'");
$stmt->execute();

$stname= $lstname = $age = $position = $gender = "";
    
while($rows = $stmt->fetch()):
    $stname = $rows['firstName'] ;
    
    $lstname =$rows['lastName'] ;

    $age  =$rows['Age'] ;

    $position = $rows['position'] ;

    $gender = $rows['Gender'] ;

    $shirt_number = $rows['shirtnumber'];
   
endwhile;
$stmt = $db->runQuery("SELECT * FROM moredetails WHERE shirtnumber = '$shirt_number'");
$stmt->execute();
while($rows= $stmt->fetch()):
$Goals = $rows['Goals'];
$Fouls = $rows['Fouls'];
$Assists = $rows['Assists'];
endwhile;
    ?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h5 class="card-title"><?php echo $stname ?></h5>
    <h5 class="card-text"><?php echo $lstname; ?></h5>
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Age:<?php echo $age ?></li>
    <li class="list-group-item">Shirtnumber:<?php echo $shirt_number ?></li>
    <li class="list-group-item">Position:<?php echo $position ?></li>
    <li class="list-group-item">Gender:<?php echo $gender ?></li>
    <li class="list-group-item">Goals:<?php echo $Goals ?></li></li>
    <li class="list-group-item">Fouls:<?php echo $Fouls ?></li></li>
    <li class="list-group-item">Assists:<?php echo $Assists ?></li></li>
  </ul>
  <div class="card-body">
    <a href='moredetails.php?edit=".<?php $rows['id'];?>."' class="card-link"><button class="btn btn-primary">EDIT</button></a>
    <a href='moredetails.php?delete=".<?php $rows['id'];?>."' class="card-link"><button name="delete" class="btn btn-danger">DELETE</button></a>
  
      </div>
    </div>
  </div>
</div>
<?php

}


  

?>

  </div>
  </div>
  </div>
</div>
</div>
</div>
<?php
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $stmt = $db->runQuery("DELETE  FROM moredetails WHERE id = '$delete'");
    $stmt->execute();
}



  

?>

</body>
</html>