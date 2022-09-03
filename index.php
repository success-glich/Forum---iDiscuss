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
<!-- sliders -->

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/2400x800/?apple,code" class="d-block w-100" alt>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x800/?coding,language" class="d-block w-100" alt>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x800/?code" class="d-block w-100" alt>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Category Container Starts Here -->
<div class="container">
  <h1 class="text-center my-3">iDiscuss - Browse Category</h1>
  <div class="row">
    <!-- Fetch all the categories  -->
    <?php
    $sql = "SELECT * FROM `categories`
            ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      // print_r($row);
    ?>
      <div class="col-md-4 my-2">
        <div class="card " style="width: 18rem;">
          <img src="https://source.unsplash.com/500x400/?coding,<?php echo $row["category_name"] ?>" class="card-img-top" alt="...">
          <div cFlass="card-body ">
            <a style=" text-decoration: none;" href="threadlist.php?id=<?php echo $row['category_id']; ?>">
              <h5 class="card-title"><?php echo $row["category_name"]; ?> </h5>
            </a>
            <p class="card-text"><?php echo substr(($row["category_description"]), 0, 90); ?>.......</p>
            <a href="threadlist.php?id=<?php echo $row['category_id']; ?>" class="btn btn-primary">View Thread</a>
          </div>
        </div>

      </div>
    <?php
    }

    ?>



  </div>
</div>

<?php include("./partials/_footer.php") ?>