<?php
include("./partials/_header.php");
include("./partials/_dbconnect.php");
?>

<div class="container" style="min-height: 83vh; width:45vw">
    <h2 class="text-center my-2">Contact Us</h2>
    <form action="">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"> Your message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button class="btn btn-success form-control">Submit</button>
    </form>

</div>


<?php include("./partials/_footer.php") ?>