<?php
include('./inc/header.php');
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT* FROM users WHERE id=$id"; 
$result = mysqli_query($con,$query) or die (' mysqli_error()');
$row = mysqli_fetch_assoc($result);
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$activated_at = date("Y-m-d H:i:s");
$active = 1;
$update="update users set activated_at='".$activated_at."', active='".$active."'where id='".$id."'";
mysqli_query($con, $update) or die('mysqli_error()');
$status = '<div class="alert alert-success text-center" role="alert">
Record Updated Successfully. <a href="index.php" class="alert-link">View Changes</a>
</div>';
echo $status;
}else {
?>
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
        <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
      <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
      <h4>You are about to activate this user <input name="submit" type="submit" class="link link-primary" value="OK" /></h4>
        </form>
        </div>
    </div>
</div>
<?php } ?>