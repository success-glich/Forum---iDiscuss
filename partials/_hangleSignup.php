<?php
    $showError="false";
        include "_dbconnect.php";
    if(isset($_POST["signup"])){

        $user_email =$_POST["email"];
        $pass =$_POST["pass"];
        $name =$_POST["name"];
        $cpass =$_POST["cpass"];

        //Check whether this email exists
        $existSql ="select * from users where user_email='$user_email'";
        $result =mysqli_query($conn,$existSql);
        $numRows =mysqli_num_rows($result);
        if($numRows==0){
            if($pass==$cpass){
                    $hash =password_hash($pass,PASSWORD_DEFAULT);
                    $sql="INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`, `name`) VALUES (NULL, '$user_email', '$hash', current_timestamp(),'$name');";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                     header("Location:/forum/index.php?msg=1");   
                    }

            }else{
                $showError="Passwords do not match";
                header("Location:/forum/index.php?msg=0&error=$showError");   

            }

        }else{
                $showError ="Email already in use";
                header("Location:/forum/index.php?msg=0&error=$showError");   

        }

    }
?>