<link href="assets/front/css/login.css" rel="stylesheet">
<style>
  * {
    font-family: "Poppins", sans-serif;
  }
</style>
<?php
if (isset($_POST['submit'])) {
  auth($_POST);
  header("location:index.php");
}
?>
<div class="content">
  <div class="container">
    <div class="row justify-content-center">
      <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
      <div class="col-3 contents">
        <div class="row justify-content-center">
          <div class="col-md-9">
            <div style="border-radius: 10px;" class="form-block">
              <div class="mb-4">
                <h3>Log In</h3>
              </div>
              <form action="" method="POST">
                <div class="form-group first">
                  <input required autocomplete="off" name="username" style="font-size: 0.8em;" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group last mb-4">
                  <input required autocomplete="off" name="password" style="font-size: 0.8em;" type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-pill text-white btn-block btn-success">Login</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>