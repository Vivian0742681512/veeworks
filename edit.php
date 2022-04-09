<?php
include('./inc/header.php');
require('db.php');
include('auth_session.php');
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ('mysqli_error()');
$row = mysqli_fetch_assoc($result);
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$updated_at = date("Y-m-d H:i:s");
$firstname =$_REQUEST['firstname'];
$lastname =$_REQUEST['lastname'];
$username =$_REQUEST['username'];
$email =$_REQUEST['email'];
$phone =$_REQUEST['phone'];
$address =$_REQUEST['address'];
$comment =$_REQUEST['comment'];
$update="update users set updated_at='".$updated_at."', firstname='".$firstname."', lastname='".$lastname."', 
username='".$username."', email='".$email."', phone='".$phone."', address='".$address."', comment='".$comment."'
where id='".$id."'";
mysqli_query($con, $update) or die('mysqli_error()');
$status = '<div class="alert alert-success text-center" role="alert">
Record Updated Successfully. <a href="index.php" class="alert-link">View Changes</a>
</div>';
echo $status;
}else {
?>
<div class="container py-5">
     <div class="card shadow">
         <div class="card-header">
             <h4>Update details</h4>
         </div>
         <div class="card-body">
         <form name="form" method="post" action="">
             <div class="row"> 
        <input type="hidden" name="new" value="1" />
      <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <div class="col-md-6">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" value="<?php echo $row['firstname'];?>" name="firstname" class="form-control" id="firstname">
  </div>
  <div class="col-md-6">
    <label for="lastname" class="form-label">Second Name</label>
    <input type="text" value="<?php echo $row['lastname'];?>" name="lastname" class="form-control" id="lastname">
  </div>
  <div class="col-12">
    <label for="email" class="form-label">Email</label>
    <input type="email" value="<?php echo $row['email'];?>" name="email" class="form-control" id="email" >
  </div>
  <div class="col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" value="<?php echo $row['username'];?>" name="username" class="form-control" id="username">
  </div>
  <div class="col-6">
    <label for="phone" class="form-label">Phone No</label>
    <input type="text" value="<?php echo $row['phone'];?>" name="phone" class="form-control" id="phone">
  </div>
  <div class="col-md-12">
    <label for="address" class="form-label">Address</label>
    <input type="text" value="<?php echo $row['address'];?>" name="address" class="form-control" id="address">
  </div>
  <div class="col-md-12 mt-3">
  <div class="form-floating">
  <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $row['comment'];?></textarea>
  <label for="floatingTextarea2">Comments</label>
</div>
  </div>
<p><input name="submit" type="submit" class="btn btn-success mt-3" value="Update" /></p>
</div>
</form>
<?php } ?>
         </div>
     </div>
 </div>
</div>
</body>
</html>