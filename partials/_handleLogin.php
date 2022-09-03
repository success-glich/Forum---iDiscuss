<?php
include "_dbconnect.php";
    $showError="false";
        include "_dbconnect.php";
    if(isset($_POST["login"])){

        $email =$_POST["email"];
        $pass =$_POST["pass"];
        echo $pass;
      

        //Check whether this email exists
        $existSql ="select * from users where user_email='$email'";
        $result =mysqli_query($conn,$existSql);
        $numRows =mysqli_num_rows($result);
        if($numRows==1){
                $row=mysqli_fetch_assoc($result);
                // print_r($row);
                $rowpass=$row["user_pass"];
                if(password_verify($pass,$rowpass)){
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['id']=$row["sno"];
                    $_SESSION['name']=$row["name"];
                    $_SESSION['useremail']=$email;
                    // echo $_SESSION['useremail'];
                    echo "logged in".$email;
                    // die();
                    header("Location:/forum/index.php?msg=success");
                    exit();


                }else{
                    header("Location:/forum/index.php?msg=0");

                }

        }else{
            header("location:/forum");

        }
      

    }
?>