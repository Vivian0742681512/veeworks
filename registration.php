<?php include('./inc/header.php');
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $firstname    = stripslashes($_REQUEST['firstname']);
        $firstname    = mysqli_real_escape_string($con, $firstname);
        $lastname    = stripslashes($_REQUEST['lastname']);
        $lastname    = mysqli_real_escape_string($con, $lastname);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phone    = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);
        $address    = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
        $comment    = stripslashes($_REQUEST['comment']);
        $comment    = mysqli_real_escape_string($con, $comment);
        $create_datetime = date("Y-m-d H:i:s");
        $updated_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (firstname, lastname, username, password, email, phone, address, comment, created_at, updated_at)
                     VALUES ('$firstname','$lastname','$username', '" . md5($password) . "', '$email', '$phone', '$address', '$comment', '$create_datetime', '$updated_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='alert'>
                  <h3>SUCCESSFULLY REGISTERED.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='alert'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="p-5 text-center bg-light" style="margin-top: 58px;">
    <h4 class="mb-3">Sign up as new user</h4>
  </div>
  <!-- Jumbotron -->
  <div class="container py-5">
  <form action="" method="post" class="row g-3 px-5">
  <div class="col-md-6">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" name="firstname" class="form-control" id="firstname">
  </div>
  <div class="col-md-6">
    <label for="lastname" class="form-label">Second Name</label>
    <input type="text" name="lastname" class="form-control" id="lastname">
  </div>
  <div class="col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username">
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <div class="col-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email" >
  </div>
  <div class="col-6">
    <label for="phone" class="form-label">Phone No</label>
    <input type="text" name="phone" class="form-control" id="phone">
  </div>
  <div class="col-md-12">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address">
  </div>
  <div class="col-md-12">
  <div class="form-floating">
  <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Comments</label>
</div>
  </div>
  <div class="col-12">
    <button type="submit" name="submit" value="Register" class="btn btn-primary ">Submit</button>
    <button class="btn btn-danger float-end" type="reset">Reset</button>

  </div>
</form>
</div>
<?php
    }
?>
<?php include('./inc/footer.php')?>