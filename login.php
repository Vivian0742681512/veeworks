<?php include './inc/header.php'?>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die('mysqli_error()');
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>

<div class="d-flex justify-content-center align-items-center container py-5 ">
    <div class="row">
   <form action="" method="post" name="login">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="username">Username</label>
    <input type="text" name="username" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="password">Password</label>
    <input type="password" name="password" class="form-control" />
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <label class="form-check-label" for="form2Example31"> Remember me </label>
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked/>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit"  name="submit" class="btn btn-primary btn-block mb-4 float-right">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="./registration.php">Register</a></p>
    </div>
   </form>
</div>
</div>
<?php
    }
?>
<?php include './inc/footer.php'?>