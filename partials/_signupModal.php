<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup to iDiscuss Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/forum/partials/_hangleSignup.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name:</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Success Ghorasaini">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" require>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
            <input type="password" name="cpass" class="form-control" id="exampleFormControlInput1" require>
          </div>
          <div class="g-recaptcha" data-sitekey="your_site_key">
          </div>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary " name="signup">Signup</button>
          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>