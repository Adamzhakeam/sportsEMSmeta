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
    <title>CRUD OPERATION</title>
</head>
<body>
<div class="container">
<form method="post" enctype="multipart/form-data" action="">
        
        
    
        <br>
        <div class="mb-3">
        <input type="file" name="file" value="">
        </div>
        
        <hr>
        <div class="row g-3">
        <div class="col">
            
            <label >Firstname</label>
            <input type="text" class="form-control" name="firstName">
            </div>
            <div class="col">
                
            <label >lastName</label>
            <input type="text" class="form-control" name="lastName">
            </div>
        
        </div>
        
        <div class="col-12">
          <label for="">Shirt Number</label>
<input type="number" class="form-control "name="shirtnumber">
        </div>
        <div class="col-12">
            
        <label >Age</label>
        <input type="number" class="form-control" name="Age">
        </div>
    
        
        <div class="col-12">
            
        <label >Position</label>
        <input type="text" class="form-control" name="position">
        </div>
        
        <div class="col-12">
            
        <label >Gender</label>
        <br>
        </div>
        <label >MALE:</label>
    <input type="radio" class="" name="Gender" value="MALE">
    <label >FEMALE:</label>
    <input type="radio" class="" name="Gender" value="FEMALE">
        
        
        

        <br>
        <button type="submit" class="btn btn-primary" name="submit" >submit</button>
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




<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Age</th>
      <th scope="col">Position</th>
      <th scope="col">Gender</th>
      <th scope="col">Shirtnumber</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
$stmt = $db->runQuery("SELECT * FROM crudoperation ");
$stmt->execute();
while($rows = $stmt->fetch()){
    $id = $rows['id'];
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $age = $rows['age'];
    $gender = $rows['gender'];
    $position = $rows['position'];
    $shirtnumber = $rows['shirtnumber'];

    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$fname.'</td>
    <td>'.$lname.'</td>
    <td>'.$gender.'</td>
    <td>'.$age.'</td>
    <td>'.$position.'</td>
    <td>'.$shirtnumber.'</td>
    <td>
<button name="update" class ="btn btn-primary"><a href="update.php?updateid='.$id.'"></a>UPDATE</button>
<button  name="delete" class ="btn btn-warning><a href="imageandtext.php?deleteid='.$id.'"></a>DELETE</button>
</td>
  </tr>';

}
?>
<?php
if(isset($_POST['delete'])){
  

  $stmt = $db->runQuery("DELETE FROM crudoperation WHERE id =  '$id'");
  $stmt->execute();
  echo 'deleted successfully';
}
?>
<?php
if(isset($_POST['update'])){
  header("loaction:update.php");

}
?>
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td >Larry the Bird</td>

      <td>@twitter</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
    </tr>-->
  </tbody>
</table>
</div>
    
</body>
</html>