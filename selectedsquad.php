<?php
include 'emg_admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="emg_admin/css/roykusemererwa.css" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selected match squad</title>
</head>
<body>
  <div class="container">
    
      
          <h1 style="font-weight: bold; color:maroon;">SELECTED MATCH DAY SQUAD</h1>
          <div class="col-md-8">
<a href="data.php" class="btn btn-primary">RETURN TO PLAYER   MENU</a>
</div>
          <hr>
        
    
    <div class="row">
<?php
    $stmt = $db->runQuery("SELECT * FROM teamselect");
    $stmt->execute();
    while($rows=$stmt->fetch()){
        
        $shirtnumber  = $rows['shirt_number'];
        $idi = $rows['id'];
                

        echo'

      
        <div class="col-md-4">
        <div class="card ">
<div class="card" style="width: 22rem;">
        <img src="img/'.$process->fetchUserData($shirtnumber, 'image').'" class="card-img-top" class="rounded" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$process->fetchUserData($shirtnumber, 'name').'</h5>
    <h5 class="card-title">'.$process->fetchUserData($shirtnumber, 'lname').'</h5>
    <a href="details.php?id='.$process->fetchUserData($shirtnumber, 'id').'" class="btn btn-success">VIEW PROFILE</a>
    <a href="selectedsquad.php?deleteid='.$idi.'" class="btn btn-danger">REMOVE</a>
  
    
    </div>
    </div>
  </div>
  </div>
  
    <br>
    

        ';
   
    }
  
      ?>
      
   </div>
</body>

</div>
</html>
<?php 
if(isset($_GET['deleteid'])){
  $deleteid = $_GET['deleteid'];

  $stmt = $db->runQuery("DELETE FROM teamselect WHERE id = '$deleteid'");
  $stmt->execute();

}

?>