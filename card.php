<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>

    <!-- display content  -->


    <div class="container ">
        <?php
        session_start();
        $showalert=false;
         $servername="localhost";
         $username="root";
         $password="";
         $database="myproject";
         $con=mysqli_connect($servername,$username,$password,$database);

      
        $card_id=$_GET["card_id"];
        $sql="select * from information where sir_no='$card_id'";
        $result=mysqli_query($con,$sql);

        while($row=mysqli_fetch_assoc($result))
        {
            $card_title=$row['language'];
            $description=$row['description'];
          echo'
                        <div class="card my-4">
                <div class="card-header bg-secondary text-light">
                  <h2 class="text-center ">  descuse</h2>
                </div>
                <div class="card-body ">
                    <h5 class="card-title text-center "> '.$card_title.'</h5>
                    <p class="card-text">'.$description.'</p>
                </div>
                </div>';
        }

      
                    

     ?>
      
      <?php

    
        $method=$_SERVER["REQUEST_METHOD"];
        if($method =="POST")
        {
            // $card_id=$_GET["card_id"];
            $title=$_POST['title'];
            $desc=$_POST['desc'];
           $user_id=$_POST['id'];
        
            
            if(empty($title)&&empty($desc))
            {
                echo "title is empty ";
                echo "decriptio empty ";
                return false;
            }
            else{

                $sql="INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_info_id`, `user_id`) VALUES (NULL, '$title', '$desc', '$card_id','$user_id');";
                $insert=mysqli_query($con,$sql);
                if($insert)
                {
        
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>sumbited succefully !</strong> your comment posted 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        
                }

            }

        }
        // else
        // {
        //     echo "not found";
        // }

    if(isset($_SESSION['login'])&& $_SESSION['login']==true)
    {
  
     echo'


        <form action='. $_SERVER["REQUEST_URI"].' method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label ">title of decuse</label>
               
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <input type="hidden" name="id" id="id" value=" '.$_SESSION['id'].'">
                <div id="emailHelp" class="form-text ">you are ask qusetion</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">decription</label>
                <input type="text" class="form-control" id="desc" name="desc" aria-describedby="emailHelp">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" id="contactForm"  class="btn btn-primary form-control">Submit</button>
        </form>';
    }else{
        echo "you are not login";
    }
        ?> 
       
<?php

// insert description in database 

       $id=$_GET["card_id"];
       $sql="select * from thread where thread_info_id='$id'";
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
        <div class="card  justifay-content mt-2 mx-5" >
            <div class="row g-0">
                <div class="col-md-1 mt-3 text-center">
                    <img src="account.png" width="54px" class="img-fluid rounded-start a" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <div><p><strong>Posted by ->'.$user_name.' </strong></p></div>
                        <h5 class="card-title"> <a href="threat.php?card_id='.$id.'" style="text-decoration:none" class="text-dark ">'.$title.'</a></h5>
                        <p class="card-text">'.$desc.'</p>
                    </div>
                </div>
            </div>
        </div>
    ';
       }
    ?>
    </div>



</body>

</html>