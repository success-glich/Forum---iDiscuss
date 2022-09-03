<?php include("_loginModal.php"); ?>
<?php include("_signupModal.php"); ?>
<?php @session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to iDiscuss -Coding forums</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://www.google.com/recaptcha/api.js" async defer>
  </script>
</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/forum">iDiscuss</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/forum">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              <?php
              include_once("_dbconnect.php");
              $sql = "select category_name ,category_id from categories limit 5";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                $id =$row["category_id"];
              ?>
               <li><a class="dropdown-item" href="threadlist.php?id=<?php echo $id; ?>"><?php echo $row["category_name"]; ?></a>
          </li>
        <?php
              }

        ?>

     
        </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contact.php">Contact</a>
        </li>
        </ul>
        <form class="d-flex my-0" role="search" action="search.php" method="get">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>

        </form>

        <!-- 
        print_r($_SESSION);
        // die(); ?> -->
        <?php

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
          // echo "loggedin";
        ?>
          <div class="">

            <span class="text-light my-0 mx-2">Welcome <?php echo $_SESSION["name"]  ?></span>


            <a href="/forum/partials/_logout.php" style="text-decoration:none;"> <button class="btn btn-outline-danger mx-2" data-bs-toggle="modal" data-bs-target="#loginModal"> Logout </button> </a>
          </div>

        <?php
        } else {

        ?>
          <div class="">




            <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <button class="btn btn-outline-success mr-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
          </div>

        <?php
        }



        ?>
        <!-- <div class="">

          <span class="text-light my-0 mx-2">Welcome </span>


          <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-outline-success mr-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
        </div> -->
        <!-- <div class="">
        
          <span class="text-light my-0 mx-2">Welcome </span>


          <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-outline-success mr-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
        </div> -->
      </div>
    </div>
  </nav>

  <!-- coursel -->