
 <?php
// include "loginmodal.php";
$showAlert=false;
$logoutvar=false;
include "dbconnect.php";

if($_SERVER['REQUEST_METHOD']=="POST")
 {
    $name=$_POST['name'];
    $password=$_POST['password'];
    // if(empty($password))
    // {
    //     echo "password empty ";
    // }else
    // {
        $sql="select * from singup where name='$name'" ;
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
         $row=mysqli_fetch_assoc($result);
         if(password_verify($password,$row['password'])){
            session_start();
            $_SESSION['name']=$name;
            $_SESSION['id']=$row['id'];
            $_SESSION['login']=true;
            $showAlert=true;
            $logoutvar=true;
            header("location:/myproject /home.php?show=$showAlert");
           echo "login";

         }else{
            header("location:/myproject /home.php?show=$showAlert");
         }
              
        }else{
            echo "not extist data in database";
        }
//     }
 }
 
?>
