<?php
include("./partials/_header.php");
include("./partials/_dbconnect.php");
?>

<?php



$id = $_GET['id'];
$sql = "SELECT * FROM `categories` WHERE category_id =$id;";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
// print_r($row);


?>
<?php
$err = [];
if (isset($_POST["submit"])) {
    // echo "nice";
    // die();
    $user_id=$_SESSION['id'];
    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $title = $_POST["title"];
        $title = str_replace("<","&lt;","$title");
        $title = str_replace(">","&gt;","$title");
    } else {
        $err["errTitle"] = "Title cannot be empty";
    }
    if (isset($_POST["desc"]) && !empty($_POST["desc"])) {
        $desc = $_POST["desc"];
        $desc = str_replace("<","&lt;","$desc");
        $desc = str_replace(">","&gt;","$desc");
  
    } else {
        $err["errTitle"] = "Title cannot be empty";
    }
    if (count($err) == 0) {

        $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$title', '$desc', '$id', '$user_id', current_timestamp());";
        $res = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($res);
        // print_r($row);
        if ($res) {
?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> Your thread has been added! Please wait for community to
                response.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php
        }
    }
}


?>



<div class="container my-4">


    <div class="jumbotron " style="background-color: #e9e9e9;">
        <h1 class="display-4">Welcome to <?php echo $row["category_name"] ?> Forums</h1>
        <p class="lead"> <?php echo $row["category_description"]; ?></p>
        <hr class="my-4">
        <p>This forum is peer to peer forum for sharing knowledge with each other. No spam / Advertising / Self-promote in the forum is not allowed. Do not post copy-right content. Do not post "offensive" posts links or images. ...Do not cross post questions. Do not Pm Users asking for help. Reamin respectful of other members at all times.</p>
        <p class="lead">
            <a class="btn btn-success btn-lg my-3 mx-2" href="#" role="button">Learn more</a>
        </p>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    ?>

        <div class="container">
            <h1 class="py-2">Start a Discussions</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ellaborate Your Concern</label>
                    <input type="text" class="form-control" name="desc" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-success" name="submit">Submit</button>
            </form>
        </div>
    <?php
    }
    else{
        ?>
    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
    </div>
        <?php
    }
    ?>


    <div class="container " style="min-height:433px;">
        <h1 class="py-2 mb-5">Browse Question</h1>

        <?php
        $sql = "select * from threads where thread_cat_id = $id ;";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["thread_id"];
            $user_id = $row["thread_user_id"];
            $title = $row["thread_title"];
            $des = $row["thread_desc"];
            $time = $row["timestamp"];
            $sql2="select * from users where sno ='$user_id'";
            // echo $sql2;
            // die();
            $res=mysqli_query($conn, $sql2);
            $row2=mysqli_fetch_assoc($res);
            // print_r($row2);
            // die();
            $name=$row2["name"];

        ?>

            <div class="media ">
                <!-- <h5 class="mt-0">Media heading</h5> -->
                <img src="user.png" width="54" class="mr-3" alt="..."> 
                <span class="mx-2 "><b> <a class="text-dark" href="threads.php?th_id=<?php echo $id ?>"><?php echo $title; ?></a></b></span>
                <span style="float:right; font-weight:bold;" class="font-weight-bold my-0"><?php echo $name." at ".$time; ?> </span>
                <div class="media-body pl-5" style="padding-left: 67px;">
                    <?php echo $des; ?>
                </div>
            </div>
        <?php } ?>
        <?php
        if ($num == 0) {
        ?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container" style="background-color:#e9e9e9;">
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