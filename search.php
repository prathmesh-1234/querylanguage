<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
    .ml-3 {
        margin-left: 50px;
    }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="">
    <!-- <h1>Hello, world!</h1> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <!-- php file includes -->
    <?php
    include "navbar.php";
    

    // login section 
   
    
          $servername="localhost";
          $username="root";
          $password="";
          $database="myproject";
          $con=mysqli_connect($servername,$username,$password,$database);
          $showsearch=true;
        if($_SERVER['REQUEST_METHOD']=="GET")
        { 
          
          $search=$_GET['search'];

        $sql="SELECT * FROM `thread` WHERE MATCH (thread_title,thread_desc) against('$search')";
       
        // $sql="select * from thread where thread_info_id='$id'";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
         $thread_id=$row['thread_id'];
         $title=$row['thread_title'];
         $desc=$row['thread_desc'];
         $user_id=$row['user_id'];
         include "dbconnect.php";
          $sql2="select * from singup where id='$user_id'";
         $result2=mysqli_query($con,$sql2);
         $row2=mysqli_fetch_assoc($result2);
        $user_name= $row2['name'];
        echo '
        <div class="container ">
         <div class="card  justifay-content mt-2 mx-5" >
             <div class="row g-0">
                 <div class="col-md-1 mt-3 text-center">
                     <img src="account.png" width="54px" class="img-fluid rounded-start a" alt="...">
                 </div>
                 <div class="col-md-8">
                     <div class="card-body">
                     <div><p><strong>Posted by ->'.$user_name.' </strong></p></div>
                         <h5 class="card-title"> '.$title.'</h5>
                         <p class="card-text">'.$desc.'</p>
                     </div>
                 </div>
             </div>
         </div>  
         </div> 
     ';
        $showsearch=false;
        }
        if($showsearch)
        {
          echo'
          <div class="container my-auto">
          <div class="card text-center ml-4 mt-5" style="width: 50rem;">
            <div class="card-body ">
                <h5 class="card-title">your search not found</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">sorry</h6>
                <p class="card-text">your search not found '.$search.'</p>
                <a href="home.php" class="btn bg-success text-light">back</a>
            
            </div>
          </div>
          </div>';
          
        }
      
      }
          ?>
  





</body>

</html>