<?php
include 'emg_admin/config.php';
if(isset($_POST['submit'])){
    $name = $_POST['firstName'];
    if(empty($_POST['firstName'])){
        echo"field reqired";
        exit();
    }
    $lname=$_POST['lastName'];
    if(empty($_POST['lastName'])){
        echo"field reqired";
        exit();
    }
    $age = $_POST['Age'];
    if(empty($_POST['Age'])){
        echo"field reqired";
        exit();
    }
    $gender = $_POST['Gender'];
    $position = $_POST['position'];       
    $shirtnumber = $_POST['shirtnumber'];
    if(empty($_POST['shirtnumber'])){
        echo"field reqired";
        exit();
    
    
    }
    
       
        if(existingshirtnumber($db,$shirtnumber) == 1){
            
            exit();
        
        }else{



        
    if($_FILES["image"]["error"] === 4){
        echo "<script> alert('Image Does Not Exist') </script>"; 
    }
    else {
        $filename = $_FILES["image"]["name"];
        $filesize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]['tmp_name'];

        $validImageExtension = ['jpg','jpeg','png','svg'];
        $imageExtension = explode('.',$filename);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo "<script> alert('Inalid Image Extension') </script>"; 
        }
        else if($filesize > 1000000){
            echo "<script> alert('File too large') </script>"; 
        }
        else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            
            move_uploaded_file($tmpName,'img/' . $newImageName);
            $INSERT = $db->runQuery("INSERT INTO register ( firstName,lastName,age,Gender,position,shirtnumber,image) 
                                                        VALUES('$name','$lname','$age','$gender','$position','$shirtnumber','$newImageName') ");
            $INSERT->execute();
            echo "<script> alert('successfuly added') 
            document.location.href = 'rugbyplayers.php';
            </script>"; 
        }
    }
}


}

function existingshirtnumber($db,$shirtnumber)
{
    $stmt = $db->runQuery("SELECT * FROM register ");
    $stmt->execute();
    while($rows=$stmt->fetch()):
        $x = $rows['shirtnumber'];
        if($x == $shirtnumber){
            echo "<script> alert('shirtnumber already taken') 
            document.location.href = 'rugbyrigester.php';
            </script>"; 
            exit();
        

        }
    endwhile;
}

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
    <title>RUBY PLAYER REGISTRATION</title>
</head>
<body>
        
<div class="container" style="background-color: grey; width: 750px; padding:50px; ">
<form action="" method="post" enctype="multipart/form-data" class="g">
    <center><h1 style="color: azure; font-weight:bolder;">REGISTER PLAYER </h1></center>

    <label for=""><p style="color: azure; font-weight:bolder;">FirstName </p></label>
    <input type="text" class="form-control" name="firstName" value="">
    <br>
    <label for=""><p style="color: azure; font-weight:bolder;">LastName </p></label>
    <input type="text" class="form-control" name="lastName" value="">
    <br>
    <label for=""><p style="color: azure; font-weight:bolder;">DATE OF BIRTH: </p></label>
    <input type="date"  class="form-control" name="Age" value="">
    <br>
    <label for=""><p style="color: azure; font-weight:bolder;">GENDER: </p></label><br>

    <label for=""><p style="color: azure; font-weight:bolder;">MALE </p></label>
    <input type="radio"  name="Gender" value="Male">
    <br>
    <label for=""><p style="color: azure; font-weight:bolder;">FEMALE </p></label>
    <input type="radio" class="" name="Gender" value="Female">
    <br>
    <label for=""><p style="color: azure; font-weight:bolder;">POSITION </p></label>
    <select class="form-control" name="position" >
        <option value="LOOSE HEAD PROP">LOOSE HEAD PROP</option>
        <option value="HOOKER">HOOKER</option>
        <option value="TIGHTHEAD PROP">TIGHTHEAD PROP</option>
        <option value="NUMBER 4 LOCK">NUMBER 4 LOCK</option>
        <option value="NUMBER 5 LOCK">NUMBER 5 LOCK</option>
        <option value="BLINDSIDE FLANKER">BLINDSIDE FLANKER</option>
        <option value="OPEN SIDE FLANKER">OPEN SIDE FLANKER</option>
        <option value="EIGHTMAN">EIGHTMAN</option>
        <option value="FLY-HALF">FLY-HALF</option>
        <option value="SCRUM-HALF">SCRUM-HALF</option>
        <option value="LEFT WINGER">LEFT WINGER</option>
        <option value="RIGHT WINGER">RIGHT WINGER</option>
        <option value="INSIDE CENTRE">INSIDE CENTRE</option>
        <option value="OUTSIDE CENTER CENTRE">OUTSIDE CENTRE</option>
        <option value="FULLBACK">FULLBACK</option>

    </select>
    <br>
    <label for=""><p style="color: azure; font-weight:bolder;">SHIRTNUMBER </p></label>
    <input type="number" name="shirtnumber" class="form-control" value="">
    <br>
    <label for="">Image</label>
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .svg"> <br> <br>
    <button type="submit" name="submit">SUBMIT</button>

</form>
</div>
<br>
<button><a href="data.php">data</a></button>
<button><a href="dashboard.php">DASHBOARD</a></button>
    
</body>
</html>