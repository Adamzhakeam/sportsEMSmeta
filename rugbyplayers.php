<?php
include 'emg_admin/config.php';
$stmt = $db->runQuery("SELECT * FROM register ");
$stmt->execute();
while($rows = $stmt->fetch()):
   
    $shirtnumber = $rows['shirtnumber'];
   
endwhile;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
<link rel="stylesheet" href="emg_admin/css/roykusemererwa.css">  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTERED PLAYERS </title>
</head>
<body>

<div class="container">
<center><h1 style="color:crimson; font-weight:bold; font-size:50px;">REGISTERED PLAYERS</h1></center>
<?php
if(isset($_POST['search'])){
  $searchi = $_POST['searchi'];
  if(!empty($_POST['searchi'])){
    
    $stmt = $db->runQuery("SELECT * FROM fileupload WHERE name like '%$searchi%' or lname like '%$searchi%'");
    
    $stmt->execute();
    while($rows=$stmt->fetch()):

    endwhile;
  }else {
  echo "<script> 
  alert('no matches found')
  document.location.href='data.php';
  </script>";
  }

}
?>

  <form action="" method="post">
<div class="input-group rounded">
  <input type="search" class="form-control rounded" placeholder="Search" name="searchi" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <button type="submit" name="search" class="btn btn-primary">
    <i class="fas fa-search">SEARCH</i>
    </button>
  </span>
</div>
</form>

<br>
<br>



<?php

    if(isset($_GET['deleteid'])){

      
      $deleteid = $_GET['deleteid'];
    $stmt = $db->runQuery("DELETE FROM register WHERE id = '$deleteid'");
    $stmt->execute();
  }
  
    ?>
    
    <a href="rugbyrigester.php" class="btn btn-primary">REGISTER PLAYER</a>
    <a href="dashboard.php" class="btn btn-info">RETURN TO DASHBOARD</a>
    
  <a href="selectedrugbyplayers.php" class="btn btn-dark">VIEW SELECTED PLAYERS</a>
  <div id="side">
  
        <span id="opennav">&#9776;SELECTED PLAYER LIST MENU</span>

    </div>
    <div class="sidenav" id="mysidenav">
        <a href="" class="closebtn" id="closebtn">&times;</a>
        <h6>
          SELECTED TEAM PLAYERS
</h6>
            <?php
    $stmt = $db->runQuery("SELECT * FROM rugbyselect ");
    $stmt->execute();
    while($rows = $stmt->fetch()):
      $shirtnumber  = $rows['shirt_number'];
     $idi = $rows['id'];
    
       
      echo' 
      <ul>
            <li><a href="">'.$process->fetchRugbyPlayerData($shirtnumber, 'firstName'),$process->fetchUserData($shirtnumber, 'shirtnumber').'</a></li>
         
        </ul>
        

        ';
    endwhile;
?>
            
    </div>

    <style>
        #side{
            transition: margin-left 0.5s;
            padding: 20px;

        }

        #side span{
            font-size:30px;
            cursor:pointer;
        }
        .sidenav{
            height:100%;
            width:0px;
            position:fixed;
            z-index:1;
            top: 0;
            left:0;
            background-color:#9ed39f;
            overflow:hidden;
            transition:0.5s;
        }
        .sidenav .closebtn{
            font-size:36px;
            border-bottom:none;
            text-decoration:none;
           color:#fff;
           float:right;
           margin-right:30px;

        }
        .sidenav ul li a{
            padding:12px 8px 12px 30px;
            text-decoration:none;
            font-size: 18px;
            color:#fff;
            display:block;
            transition: 0.3s;
            border-bottom:1px solid #b3ddb4;
            text-transform:uppercase;

        }

        .sidenav ul li a:hover{
            background:#6ba566;
        }
    </style>
    
    <script>
     document.getElementById("opennav").addEventListener("click",function(){
      document.getElementById("mysidenav").style.width = "250px";
      document.getElementById("side").style.marginleft = "250px";
      document.body.style.backgroundcolor = "rgba(0,0,0,0.6)"
     })

     document.getElementById("closebtn").addEventListener("click",function(){
      document.getElementById("mysidenav").style.width = "0px";
      document.getElementById("side").style.marginleft = "0px";
      document.body.style.backgroundcolor = ""
     })
     
        </script>


  
    





    <br>

    <div class="row">
    <?php
    $stmt = $db->runQuery("SELECT * FROM register ORDER BY id DESC");
    $stmt->execute();
    foreach($stmt as $row){
        $image = $row['image'];
        $fname = $row['firstName'];
        $lname = $row['lastName'];
        $id = $row['id'];
        $shirtnumber = $row['shirtnumber'];
        $injuriesx = $row=['injuries'];

         // Add a CSS class to the card based on the value of the "injuries" field
  $cardsClass = $injuriesx > 0 ? "card shadow white-bg bg-danger" : "card shadow white-bg";
 
       
      echo'
      

        <div class="col-md-4">
<div class="'.$cardsClass.'" style="width:22 rem;">
        <img src="img/'. $image.'" class="card-img-top" class="rounded" alt="...">
  <div class="card-body">
    <h5 class="card-title">'. $fname .'</h5>
    <h5 class="card-title">'. $lname.'</h5>
    <a href="rugbydetails.php?id='. $id .'" class="btn btn-success">VIEW PROFILE</a>
    <a href="rugbyplayers.php?deleteid='. $id.'" class="btn btn-danger">DELETE</a>
  
    <form method="post">
    
  <button type="submit" value="'. $shirtnumber .'" name="ADD" class="btn btn-flickr" style=" padding:-10px;"'.($injuriesx > 0 ? 'disabled' : '').' >ADD</button>
    </form>
    
    </div>
  </div>
  
    </div>
    <br>
    <br>';
    }
?>

     <?php
     function existingshirtnumberselected($db,$shirtnumber)
     {
         $stmt = $db->runQuery("SELECT * FROM teamselect ");
         $stmt->execute();
         while($rows=$stmt->fetch()):
             $x = $rows['shirt_number'];
             if( $x == 1 ){
                 echo "<script> alert('player already added ') 
                 document.location.href = 'data.php';
                 </script>"; 
                 exit();
             
     
             } 
              
             
         endwhile;
     }
     
     
        if(isset($_POST['ADD'])){
          

          $selected = $_POST['ADD'];
          if ($process->canceldoubleaddition($selected)) {
              echo "<script> alert('player already added to selection list')</script>";
          } else {
              $INSERT = $db->runQuery("INSERT INTO rugbyselect (shirt_number)
                                       VALUES('$selected')");
              $INSERT->execute();
              echo "<script> alert('player has been added')</script>";
                 }
     } 
       
     
    ?>
    </div>
</div>
</div>
<br>

</body>
</html>