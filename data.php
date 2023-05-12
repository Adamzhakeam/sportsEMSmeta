<?php
include 'emg_admin/config.php';
$stmt = $db->runQuery("SELECT * FROM fileupload ");
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
// if(isset($_POST['search'])){
//   $searchi = $_POST['searchi'];
//   if(!empty($_POST['searchi'])){
    
//     $stmt = $db->runQuery("SELECT * FROM fileupload WHERE name like '%$searchi%' or lname like '%$searchi%'");
    
//     $stmt->execute();
//     while($rows=$stmt->fetch()):

//     endwhile;
//   }else {
//   echo "<script> 
//   alert('no matches found')
//   document.location.href='data.php';
//   </script>";
//   }

// }

// if(isset($_POST['search'])){
//     $searchi = $_POST['searchi'];
//     if(!empty($_POST['searchi'])){
//         $stmt = $db->runQuery("SELECT * FROM fileupload WHERE name like '%$searchi%' or lname like '%$searchi%'");
//         $stmt->execute();
//         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         if(count($results) > 0) {
//             echo "<script>
//                     let results = " . json_encode($results) . ";
//                     let html = '';
//                     for(let i=0; i<results.length; i++) {
//                         html += '<div>';
//                         html += '<p>Name: ' + results[i].name + ' ' + results[i].lname + '</p>';
//                         html += '<p>Shirt Number: ' + results[i].shirtnumber + '</p>';
//                         html += '</div>';
//                     }
//                     document.getElementById('search-results').innerHTML = html;
//                   </script>";
//         } else {
//             echo "<script> 
//                     alert('No matches found');
//                     document.location.href='data.php';
//                   </script>";
//         }
//     } else {
//         echo "<script> 
//                 alert('Please enter a search term');
//                 document.location.href='data.php';
//               </script>";
//     }
// }
?>
<?php




// if(isset($_POST['search'])){
  
//     $searchi = $_POST['searchi'];
  
//     if(!empty($_POST['searchi'])){
//         $stmt = $db->runQuery("SELECT * FROM fileupload WHERE 
//                               name like '%$searchi%' 
//                               OR lname like '%$searchi%' 
//                               OR age like '%$searchi%'
//                               OR gender like '%$searchi%'
//                               OR position like '%$searchi%'
//                               OR shirtnumber like '%$searchi%'");
//         $stmt->execute();
//         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         if(count($results) > 0) {
//             // Use json_encode to convert the array of results to a JavaScript object
//             echo "<script>
//                     let results = " . json_encode($results) . ";
//                     let html = '';
//                     for(let i=0; i<results.length; i++) {
//                         html += '<div>';
//                         html += '<p>Name: ' + results[i].name + ' ' + results[i].lname + '</p>';
//                         html += '<p>Age: ' + results[i].age + '</p>';
//                         html += '<p>Gender: ' + results[i].gender + '</p>';
//                         html += '<p>Position: ' + results[i].position + '</p>';
//                         html += '<p>Shirt Number: ' + results[i].shirtnumber + '</p>';
//                         html += '</div>';
//                     }
//                     // Update the innerHTML of the search-results div with the generated HTML
//                     document.getElementById('search-results').innerHTML = html;
//                   </script>";
//         } else {
//             echo "<script> 
//                     alert('No matches found');
//                     document.location.href='data.php';
//                   </script>";
//         }
//     } else {
//         echo "<script> 
//                 alert('Please enter a search term');
//                 document.location.href='data.php';
//               </script>";
//     }
// }
// ?>

<!-- Add the search-results div to the HTML code 

<div id="search-results"></div>

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
-->
<!--
<div id="search-results"></div>



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

-->



<?php
// Initialize database connection and other variables here

if(isset($_POST['search'])) {
  
    $searchi = $_POST['searchi'];
  
    if(!empty($_POST['searchi'])) {
        $stmt = $db->runQuery("SELECT * FROM fileupload WHERE 
                              name like '%$searchi%'
                              OR id like '%$searchi%' 
                              OR lname like '%$searchi%' 
                              OR age like '%$searchi%'
                              OR gender like '%$searchi%'
                              OR position like '%$searchi%'
                              OR shirtnumber like '%$searchi%'");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($results) > 0) {
            // Use json_encode to convert the array of results to a JavaScript object
            $results_json = json_encode($results);
        } else {
            $results_json = '[]'; // Empty array if no results found
        }
    } else {
        $results_json = '[]'; // Empty array if no search term entered
    }
}

?>

<!-- HTML code for the dropdown -->
<select id="search-dropdown"></select>

<!-- JavaScript code to populate the dropdown -->
<script>
let results = <?php echo $results_json; ?>;
let dropdown = document.getElementById('search-dropdown');

// Create an option element for each result and append it to the dropdown
results.forEach(function(result) {
  let option = document.createElement('option');
  option.text = result.name + ' ' + result.lname;
  option.value = result.id;
  option.setAttribute('data-url', `details.php?id=${result.id}`);
  dropdown.add(option);
});

// Add event listener for the onchange event of the dropdown
dropdown.addEventListener('change', function() {
  let selectedOption = this.options[this.selectedIndex];
  let url = selectedOption.getAttribute('data-url');
  if(url) {
    window.location.href = url;
  }
});
</script>

<!-- HTML code for the search form -->
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
<?php

    if(isset($_GET['deleteid'])){

      
      $deleteid = $_GET['deleteid'];
    $stmt = $db->runQuery("DELETE FROM fileupload WHERE id = '$deleteid'");
    $stmt->execute();
  }
  
    ?>
    
    <a href="imageandtext.php" class="btn btn-primary">REGISTER PLAYER</a>
    <a href="dashboard.php" class="btn btn-info">RETURN TO DASHBOARD</a>
    
  <a href="selectedsquad.php" class="btn btn-dark">VIEW SELECTED PLAYERS</a>
  <div id="side">
  
        <span id="opennav">&#9776;SELECTED PLAYER LIST MENU</span>

    </div>
    <div class="sidenav" id="mysidenav">
        <a href="" class="closebtn" id="closebtn">&times;</a>
        <h6>
          SELECTED TEAM PLAYERS
</h6>
            <?php
    $stmt = $db->runQuery("SELECT * FROM teamselect ");
    $stmt->execute();
    while($rows = $stmt->fetch()):
      $shirtnumber  = $rows['shirt_number'];
     $idi = $rows['id'];
    
       
      echo' 
      <ul>
            <li><a href="">'.$process->fetchUserData($shirtnumber, 'lname'),$process->fetchUserData($shirtnumber, 'shirtnumber').'</a></li>
         
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
   
<!-- //     while($rows = $stmt->fetch()):
//         $image = $rows['image'];
//         $fname = $rows['name'];
//         $lname = $rows['lname'];
//         $id = $rows['id'];
//         $shirtnumber = $rows['shirtnumber'];
       
//       echo' 
      

//         <div class="col-md-4">
// <div class="card shadow white-bg" style="width:22 rem;">
//         <img src="img/'. $image.'" class="card-img-top" class="rounded" alt="...">
//   <div class="card-body" id="mycard">
//     <h5 class="card-title">'. $fname .'</h5>
//     <h5 class="card-title">'. $lname .'</h5>
//     <a href="details.php?id='. $id .'" class="btn btn-success">VIEW PROFILE</a>
//     <a href="data.php?deleteid='. $id.'" class="btn btn-danger">DELETE</a>
  
//     <form method="post">
    
//   <button type="submit" value="'. $shirtnumber .'" name="ADD" class="btn btn-flickr" style=" padding:-10px;" >ADD</button>
//     </form>
    
//     </div>
//   </div>
  
//     </div>
//     <br>
//     <br>
//     ';
//     endwhile; -->

<?php 
$stmt = $db->runQuery("SELECT * FROM fileupload ORDER BY id DESC");
$stmt->execute();

foreach($stmt as $row){
  $image = $row['image'];
  $fname = $row['name'];
  $lname = $row['lname'];
  $id = $row['id'];
  $shirtnumber = $row['shirtnumber'];
  $injuries = $row['injuries'];
  
  // Add a CSS class to the card based on the value of the "injuries" field
  $cardClass = $injuries > 0 ? "card shadow white-bg bg-danger" : "card shadow white-bg";
  
  echo '
    <div class="col-md-4">
      <div class="'. $cardClass .'" style="width: 22rem;">
        <img src="img/'. $image.'" class="card-img-top rounded" alt="...">
        <div class="card-body" id="mycard">
          <h5 class="card-title">'. $fname .'</h5>
          <h5 class="card-title">'. $lname .'</h5>
          <a href="details.php?id='. $id .'" class="btn btn-success">VIEW PROFILE</a>
          <a href="data.php?deleteid='. $id.'" class="btn btn-danger">DELETE</a>
  
          <form method="post" action="data.php">
          <button type="submit" value="'.$shirtnumber.'" name="ADD" class="btn btn-flickr" style="padding:-10px;" '.($injuries > 0 ? 'disabled' : '').'>ADD</button>
          </form>
        </div>
      </div>
    </div>
    <br>
    <br>
  ';
    
}
?>
<script>
          
          fetch('injuries.php')
          .then(response => response.json())
          .then(injuries =>{
           const card = document.getElementById('mycard');
          const value = injuries.value;
          if(value > 0){
           card.style.backgroundColor = 'red';
     
          }else if (value == 0){
           card.style.backgroundColor = 'white';
          }
          });
               </script>
     
     <?php
    //  function existingshirtnumberselected($db,$shirtnumber)
    //  {
    //      $stmt = $db->runQuery("SELECT * FROM teamselect ");
    //      $stmt->execute();
    //      while($rows=$stmt->fetch()):
    //          $x= $rows['shirt_number'];

             
    //           if( $x == $shirtnumber ){
    //             echo "<script> alert('player already added ') 
    //              document.location.href = 'data.php';
    //               </script>"; 
    //             exit();
             
     
    //         } 
              
             
    //      endwhile;
    //  }
     
     
        if(isset($_POST['ADD'])){
        //   if($process->canceldoubleaddittion($shirtnumber)){
        //   exit();
        //   }else{
        // $selected = $_POST['ADD'];
        // echo"$selected";
        //  // $selectedx = implode(",",$selected);
        // $INSERT = $db->runQuery("INSERT INTO teamselect (shirt_number)
        //                                 VALUES('$selected')");
        // $INSERT->execute();
        // echo "<script> alert('player has been added')</script>";
         // }
         $selected = $_POST['ADD'];
    if ($process->canceldoubleaddittion($selected)) {
        echo "<script> alert('player already added to selection list')</script>";
    } else {
        $INSERT = $db->runQuery("INSERT INTO teamselect (shirt_number)
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