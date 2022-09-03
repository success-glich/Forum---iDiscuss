<?php
include("./partials/_header.php");
include("./partials/_dbconnect.php");
?>
<?php



$id = $_GET['th_id'];
$sql = "SELECT * FROM `threads` inner join users on thread_user_id =sno  WHERE thread_id =$id;";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$num = mysqli_fetch_assoc($res);
// print_r($row);


?>

<?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$err = [];
if (isset($_POST["submit"])) {
    $user_id =$_SESSION["id"];

    if (isset($_POST["comment"]) && !empty($_POST["comment"])) {
        $comment = $_POST["comment"];
        $comment = str_replace("<","&lt;","$comment");
        $comment = str_replace(">","&gt;","$comment");
    } else {
        $err["errcomment"] = "comment cannot be empty";
    }
    if (count($err) == 0) {
        // echo "okay";
        // die;

        $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`,  `comment_by`) VALUES (NULL, '$comment', '$id',  '$user_id');";
        $res = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($res);
        // print_r($row);
        if ($res) {
?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> Your Comment has been added! Please wait for community to
                response.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php
        }
    }
}

  }
?>

<div class="container my-4">


    <div class="jumbotron " style="background-color: #e9e9e9;">
        <h1 class="display-4"><?php echo $row["thread_title"] ?></h1>
        <p class="lead"> <?php echo $row["thread_desc"]; ?></p>
        <hr class="my-4">
        <p>This forum is peer to peer forum for sharing knowledge with each other. No spam / Advertising / Self-promote in the forum is not allowed. Do not post copy-right content. Do not post "offensive" posts links or images. ...Do not cross post questions. Do not Pm Users asking for help. Reamin respectful of other members at all times.</p>
        <p class="py-0" style="padding-top:-45px;">
  <!-- <?php      print_r($row) ?> -->
            Posted by: <b> <?php  echo strtoupper( $row["name"])?> </b>
        </p>
    </div>
    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    ?>
        <div class="container">
            <h1 class="py-2">Post a Comment</h1>
            <form action="" method="POST">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Type your comment</label>
                    <textarea type="text" class="form-control" name="comment" id="exampleInputPassword1" rows="3"> </textarea>
                </div>

                <button type="submit" class="btn btn-success" name="submit">Post Comment</button>
            </form>
        </div>
    <?php
    } else {

    ?>
        <div class="container">
            <h1 class="py-2">Post a Comment</h1>
            <p class="lead">You are not logged in. Please login to be able to post a comments</p>
        </div>


    <?php
    }
    ?>

    <div class="container mb-5" style="min-height:433px;">
        <h1 class="py-2">Discussions</h1>

        <?php
        $id = $_GET["th_id"];
        $sql = "Select * from comments where thread_id='$id'";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        // echo $num;
        // die;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["comment_id"];
            $content = $row["comment_content"];
            $comment_time = $row["comment_time"];
            $user_id =$row["comment_by"];
            $sql2="select * from users where sno='$user_id'";
            $res=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($res);
            $name=$row2["name"];

        ?>

            <div class="media ">
                <!-- <h5 class="mt-0">Media heading</h5> -->
                <img src="user.png" width="54" class="mr-3" alt="..."> <span class="mx-2 "><b> <?php echo $name; ?>: </b> <?php echo $comment_time ?></span>
                <div class="media-body pl-5" style="padding-left: 67px;">
                    <?php echo $content; ?>
                </div>
            </div>
        <?php } ?>

        <?php
        if ($num == 0) {
        ?>
            <div class="jumbotron jumbotron-fluid ">
                <div class="container py-5" style="background-color:#e9e9e9;">
                    <p class="display-4">No Threads Found </p>
                    <p class="lead">Be the first person to ask the question</p>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<?php include("./partials/_footer.php"); ?>