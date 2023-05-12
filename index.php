<?php
include 'emg_admin/config.php';

?>
<!DOCTYPE html>
<html lang='en'>
<head>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>LOG INTO WREXHAM FC AI</title>
<body>
<?php
    if(isset($_POST['submit'])){
       $email = ''; 
       $username = $password = '';
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'] = '';

        $stmt = $db->runQuery("SELECT * FROM login  WHERE username = '$username' OR email = '$username' AND password = '$password'");
        $stmt->execute();
        if($rows=$stmt->fetch()){
            if($rows['email'] == "sheikh12@vox.com"){
                echo "<script> alert('loggedin added') 
            document.location.href = 'dashboard.php';
            </script>";
            }else if($rows['username'] == "admin" && $rows['password'] == "154361"){
                echo "<script> alert('loggedin successfully as admin') 
            document.location.href = 'dashboard.php';
            </script>";
            }

            else {
                echo "<script> alert('username or password incorrect') 
                document.location.href = 'login.php';
                </script>";
            }

        

    }
}
    ?>
    <div class="container" style="background-color: grey; width: 750px; padding:50px; ">
    <form action="" method="post" >
        <div style="width: 500px;">
        <Label>USERNAME/ EMAIL</Label>
        <input type="text" name="username" OR name="email" rerquired>
        <br>

        <label for="">PASSWORD</label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" name="submit" value="login">
        </div>
    </form>
    </div>
</body>
</html>