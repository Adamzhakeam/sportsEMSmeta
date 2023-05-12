<?php
include 'emg_admin/config.php';
$id = $_GET['updateid'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $lname=$_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];       
    $shirtnumber = $_POST['shirtnumber'];
    

    $fouls = $_POST['fouls'];
    $goals = $_POST['goals'];
    $assists = $_POST['assists'];
    $injuries = $_POST['injuries'];
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
            $INSERT = $db->runQuery("UPDATE fileupload SET  name='$name',lname='$lname',age='$age',gender='$gender',position='$position',shirtnumber='$shirtnumber',fouls='$fouls',goals='$goals',assists='$assists',injuries='$injuries',image='$newImageName'"); 
                        
            $INSERT->execute();
            echo "<script> alert('successfuly updated') 
            document.location.href = 'data.php';
            </script>"; 
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PLAYER DETAILS</title>
</head>

<body>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" value="">
    <br>
    <label for="">LastName</label>
    <input type="text" class="form-control" name="lname" value="">
    <br>
    <label for="">AGE</label>
    <input type="number"  class="form-control" name="age" value="">
    <br>
    <label for="">GENDER</label><br>

    <label for="">Male</label>
    <input type="radio"  name="gender" value="Male">
    <br>
    <label for="">Female</label>
    <input type="radio" class="" name="gender" value="Female">
    <br>
    <label for="">Position</label>
    <input type="text" class="form-control" name="position" value="">
    <br>
    <label for="">SHIRTNUMBER</label>
    <input type="number" name="shirtnumber" class="form-control" value="">
    <br>
    <label for="">FOULS</label>
    <input type="number" name="fouls" class="form-control" value="0">
    <br>
    <label for="">GOALS</label>
    <br>
    <input type="number" class="form-control" name="goals" value="0">
    <br>
    <label for="">ASSISTS</label>
    <input type="number"  class="form-control" name="assists" value="0">
    <br>
    <br>
    <label for="">INJURIES</label>
    <input type="number" class="form-control" name="injuries" value="0">
    <br>
    
    
    
    
    
    
    
    
    <br>
    <label for="">Image</label>
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .svg"> <br> <br>
    <button type="submit" name="submit">SUBMIT</button>

</form>
</div>
</body>
</html>