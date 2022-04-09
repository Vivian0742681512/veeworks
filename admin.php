<?php 
include('./inc/header.php');
require('./db.php');
include("auth_session.php");
include ('./inc/navbar.php')
 ?>


  <div class="container">
      <div class="row">
          <div class="card text-left">
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Created</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                          <?php
                           $users = mysqli_query($con,"select * from users ");
                           while($user = mysqli_fetch_array($users)) 
                           {?>
                      <tr>
                           <td><?php echo $user['id'] ?></td>
                          <td><?php echo $user['firstname'].' '.$user['lastname'] ?></td>
                          <td><?php echo $user['created_at'] ?></td>
                          <td><?php echo $user['username'] ?></td>
                          <td><?php echo $user['email'] ?></td>
                          <td><?php echo $user['phone'] ?></td>
                          <td><?php echo $user['active'] == 0 ? 'Not Activated' : 'Activated' ?></td>
                          <td>
                              <a href="accept.php?id=<?php echo $user["id"]; ?>" class="btn btn-primary btn-sm">Approve</a>
                              <a href="reject.php?id=<?php echo $user["id"]; ?>" class="btn btn-danger btn-sm ml-3">Reject</a>
                          </td>
                      </tr>
                      <?php
                      }
                      ?>
                  </tbody>
              </table>
            </div>
          </div>
      </div>
  </div>
  
<?php include('./inc/footer.php')?>