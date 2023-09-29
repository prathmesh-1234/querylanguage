<!-- <!doctype html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body> -->
    <!-- <h1>Hello, world!</h1> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script> -->

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->
    <?php
    // connection 
    include "dbconnect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        // check data is exist of user by fetching data on database
        $sql = "select * from singup where name='$name' ";
        $exist = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($exist);
        if ($row > 0) {
            echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>your account is alredy exist</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        } else {
            // check password is not empty          
            if (!empty($password)) {
                // authantecate the password of user 
                if ($password == $cpassword) {
                    // insert value of user in database 
                    // Username 
                    // Password 
                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "insert into singup values(null,'$name','$pass')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        echo '
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                               <strong>l successfuly</strong> Your submited successfuly
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>';
                    }
                } else {

                    echo '
                                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                               <strong>password wrong!</strong> Your password is wrong plese try agin
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>';
                }
            } else {
                echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>password Empty!</strong> password is blank so fill password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }


    ?>
    <!-- Modal -->
    <div class="modal fade" id="singupmodal" tabindex="-1" aria-labelledby="singupmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="singupmodalLabel">Singup</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="home.php" method="post">
                        <div class="mb-4">
                            <!-- <label for="exampleInputEmail1" class="form-label">Name</label> -->
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="mb-4">
                            <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                            <input type="password" class="form-control" name="password" placeholder=" password">
                        </div>
                        <div class="mb-4">
                            <!-- <label for="exampleInputPassword1" class="form-label"> </label> -->
                            <input type="password" class="form-control" name="cpassword" placeholder="confirm password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>

            </div>
        </div>
    </div>



<!-- </body>

</html> -->