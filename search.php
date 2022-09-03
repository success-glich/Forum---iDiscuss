<?php
include("./partials/_header.php");
include("./partials/_dbconnect.php");
?>
<!-- <h1>Hello, world!</h1> -->
<?php
if (isset($_GET["msg"]) && $_GET["msg"] == 1) {
?>
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>success!</strong> You can now login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}


?>
<!-- Search Result start -->
<div class="container my-3" style="min-height: 78vh;">
    <h1 class="py-3">Cannnot Install "<b><em><?php if (isset($_GET['search'])) {
                                                    echo $_GET['search'];
                                                } ?></em></b>"</h1>
    <?php
    $query = $_GET['search'];
    $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) against ('$query');";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $id = $row['thread_id'];

    ?>

            <div class="result">
                <h3>
                    <a href="threads.php?th_id=<?php echo $id ?>" class="text-dark">
                        <?php echo $title; ?></a>
                </h3>
                <p><?php echo $desc; ?>
                </p>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container py-5" style="background-color:#e9e9e9;">
            <p class="display-4">No Threads Found </p>
            <p class="lead">Suggestions: 
                    <ul>
                        <li>  Make sure that all words are spelled correctly. </li>
                        <li> Try different keywords. </li>
                        <li> Try more general keywords.  </li>
                        <li> Try fewer keywords. </li>
                    </ul>
              
                
                
                
            </p>
        </div>
    <?php
    }
    ?>


</div>

<!-- Search Result end -->


<?php include("./partials/_footer.php") ?>