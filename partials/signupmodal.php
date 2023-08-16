<!-- Button trigger modal -->
<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup to iDiscuss</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="partials/handleSignup.php" method="post">
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="signupEmail" required name="signupEmail" aria-describedby="emailHelp">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="signuppassword" required name="signuppassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">ConfirmPassword</label>
    <input type="password" class="form-control" id="signupcpassword" required name="signupcpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Signup</button>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <!-- <button type="button" class="btn btn-primary">Signup</button> -->
</div>
</form>
    </div>
  </div>
</div>
