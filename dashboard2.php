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
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,500&display=swap" rel="stylesheet">
</head>
<body id="body">
  <script>
    //SIDEBAR TOGGLE
    var sidebarOpen = false;
    var sidebar = document.getElementById("sidebar");

    function openSidebar(){
      if(!sidebarOpen){
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
      }
    }
    function closeSidebar(){
      if(sidebarOpen){
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
      }
    }
  </script>

    <!-- -->
    <div class="grid-container">

    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">
          menu
        </span>
      </div>
      <div class="header-left">
      <span class="material-icons-outlined">
search
</span>
      </div>
      <div class="header-right">
      <span class="material-icons-outlined">notifications</span>
      <span class="material-icons-outlined">email</span>
      <span class="material-icons-outlined">account_circle</span>

      </div>
    </header>
<!--end of header -->

<aside id="sidebar">
  <div class="sidebar-title">
    <div class="sidebar-brand">
    <span class="material-icons-outlined">inventory </span>MAKERERE SPORTS MANAGEMENTT SYSTEM
    </div>
    <span class="material-icons-outlined" onclick="closesidebar()">close</span>
  </div>
  <ul class="sidebar-list">
    <li class="sidebar-list-item">
    <span class="material-icons-outlined">dashboard</span>Dashboard
    </li>
    <li class="sidebar-list-item"> 
      <span class="material-icons-outlined">inventory </span> Products 
    </li>
     <li class="sidebar-list-item">
<span class="material-icons-outlined">fact_check</span> Inventory
 </li> 
<li class="sidebar-list-item">
<span class="material-icons-outlined">add_shopping_cart</span> Purchase Orders 
</li> 
<li class="sidebar-list-item">
<span class="material-icons-outlined"> shopping_carts</span> Sales Orders 
</li> 
<li class="sidebar-list-item">
<span class="material-icons-outlined">polls</span> Reports
 </li>
 <li class="sidebar-list-item">
<span class="material-icons-outlined"> settings</span>Settings</li>
  </ul>
</aside>
<!--end of side bar -->
<!--main -->
<main class="main-container">
<div class="main-title">
  <p class="font-weight-bold">DASHBOARD</p>
  </div>

  <div class="main-cards">
    <div class="card-inner">
      <p class="text-primary">PRODUCTS </p>
      
  </div>
  </div>
</main>
<!--end of main -->

    </div>

<style>
    #body{
        
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color:  #e6e8ed;
        color:  #666666;
        font-family: "Montserrat",san-serif;
        
    }

    .material-icons-outlined{
      vertical-align: middle;
      line-height: 1px;
    }
    .tex-primary{
      color: #666666;
    }
    .text-blue{
      color: #246dec;
    }
    .text-red{
      color: #cc3c43;
    }
    .text-green{
      color: #367952;
    }
    .text-orage{
      color: #f5b74f;
    }
    .font-weight-bold{
      font-weight:600;
    }

    .grid-container{
   display: grid;
   grid-template-columns: 260px 1fr 1fr 1fr;
   grid-template-rows: 0.2fr 3fr;
   grid-template-areas: 
   "sidebar header header header"
   "sidebar main main main";
   height: 100vh;
    }

    #sidebar{
   grid-area: sidebar;
   height: 100%;
   background-color: #21232d;
   color: #9799ab;
   overflow-y: auto;
   transition: all 0.5s;
   -webkit-transition: all 0.5s;
    }

    .sidebar-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding:20px 20px 20px 20px;
      margin-bottom: 30px;

    }

    .sidebar-title > span{
      display: none;
    }

    .sidebar-brand{
      margin-top: 15px;
      font-size: 20px;
      font-weight: 700;
    }

    .sidebar-list {
      padding: 0;
      margin-top: 15px;
      list-style-type: none;
    }
    .sidebar-list-item{
      padding:20px 20px 20px 20px;
    }

    .sidebar-list-item:hover {

      background-color:rgba(255,255 255, 0.2);
      cursor: pointer;
    }

    .side-responsive {
      display: inline !important;
      position:absolute;
    }
.main-container{
   grid-area: main;
   overflow-y: auto;
   padding: 20px 20px;
    }

.header{
    grid-area: header;
    height: 70px;
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 30px 0 30px;
    box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}
.menu-icon{
    display: none;
}

</style>
</body>
</html>