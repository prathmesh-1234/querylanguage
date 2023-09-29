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
    // login section 
          include "navbar.php";

      
        //   session_start();
        //   echo $_SESSION['id'];
      


        //   card section 
                
            $servername="localhost";
            $username="root";
            $password="";
            $database="myproject";
            $con=mysqli_connect($servername,$username,$password,$database);
            echo '
            <div class="contener pb-4 mb-4" >
              <div id="carouselExampleAutoplaying" class="carousel slide my-25  " data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img src="slider-5.jpg " hight="400px"  class="d-block  w-100 h-25 " alt="...">
                    </div>
                    <div class="carousel-item h-25">
                        <img src="slider-2.jpg" hight="400px"  class="d-block  w-100  h-25 " alt="...">
                    </div>
                    <div class="carousel-item h-25">
                        <img src="slider-3.jpg" hight="400px" class=" d-block w-100  " alt="...">
                    </div>
                 </div>
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                 </button>
             </div>
        
            </div>';

    
            ?>
    <!-- mx-5 mt-2 -->
    <!-- mt-3 mx-10 -->
   

    <div class="container  ">
        <?php 
        
       
        $sql="select * from information";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {   $card_id=$row['sir_no'];
            $card_title=$row['language'];
            $description=$row['description'];
        echo '
              <div class="card d-inline-block ml-3 mt-2 " style="width: 17rem;">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'.$card_title.'</h5>
                    <p class="card-text">'. substr($description,0,150).'</p>
                    <a href="card.php?card_id='.$card_id.'" class="btn btn-primary">viwe more</a>
                </div>
            </div>';
        }

        
       ?>


    </div>




</body>

</html>