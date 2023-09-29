<?php 

session_start();


?>

 <!doctype html>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php
     $servername="localhost";
     $username="root";
     $password="";
     $database="myproject";
     $con=mysqli_connect($servername,$username,$password,$database);
        
       
    
    
         
     
    

    echo'

    <nav class="navbar navbar-expand-lg  bg-secondary ">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="#">MY page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse"id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="#">About</a>
            </li>
            <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">';
            $sql="select * from information";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                 
                $card_id= $row['sir_no']; 
                $titles=$row['language'];
                echo'
                <li><a href="card.php?card_id='.$card_id.'" class="text-dark btn">'.$titles.'</a></li>';
                
            }echo'
            </ul>
            </li>
            
      </ul>
        <form class="d-flex" role="search" action="search.php" method="get">
            <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search comments" aria-label="Search">
            <button class="btn btn-outline-success text-white " type="submit">Search</button>
        </form>';
        if(isset($_SESSION['login'])&&$_SESSION['login']==true)
        {
            echo '
            <button class=" bg-success text-white me-2 ">wecome ' .$_SESSION['name'].'</button>
            <a class="btn btn-outline-success text-white " href="logout.php" >Logout</a>';
            
        }
        else{
            echo '
            <button class="btn btn-outline-success bg-success text-white ms-2 " data-bs-toggle="modal" data-bs-target="#loginmodal">login</button>
     
            <button class="btn btn-outline-success bg-success text-white ms-2 " data-bs-toggle="modal" data-bs-target="#singupmodal">Singup</button>
           ';

        }
echo '
</div>
</div></nav>
';
       
    

    include "singupmodal.php";
    include "loginmodal.php";

    if(isset($_SESSION['login'])&&$_SESSION['login']==true)
    {
       
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> login </strong> Your login successfuly
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
       
            echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> not login!</strong> Your not login plase check Id and Password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

    }



?>
 </body>
 </html>