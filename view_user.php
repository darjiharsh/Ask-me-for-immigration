<?php
  session_start();
  if(isset($_SESSION['mail'])==NULL)
  {
    header('location:login1.php');
  }
  require '../creartdemo1/database.php';
  

  // if($_SESSION['user_type']!=3)
  // {
  //   header('location:login1.php');
  // }
  //Show All type of users
  // echo "<br>"."Show All Users!"."<br>";
  $qry = "SELECT * FROM user_tbl WHERE user_type=1 AND is_active!=2";
  // echo "$qry"."<br>";
  $rs = mysqli_query($conn,$qry);

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>View User - Ask Me</title>
  <?php
  require 'link.html';
  ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Ask Me</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
       <?php
        require 'link1.php';
       ?>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  
  <div class="content-wrapper">
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      
    <!-- <div class="card mb-3">
        
    </div> -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> User Table</div>
        <div class="card-body" style="overflow: scroll;">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email Id</th>
                  <th>Mobile no</th>
                  <th>Gender</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Qualification</th>
                  <th>Image</th>
                  <th>Date Of Insertion</th>
                  <th>Date Of Updation</th>
                  <th>Active/Block</th>
                  <th>Action</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email Id</th>
                  <th>Mobile no</th>
                  <th>Gender</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Qualification</th>
                  <th>Image</th>
                  <th>Date Of Insertion</th>
                  <th>Date Of Updation</th>
                  <th>Active/Block</th>
                  <th>Action</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
              <?php
              if(mysqli_num_rows($rs) > 0)
                {
                  while($row = mysqli_fetch_assoc($rs))
                  {
              ?>
              
                <tr>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['email_id']; ?></td>
                  <td><?php echo $row['mobile_no']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['country_id'];?></td>
                  <td><?php echo $row['state_id']; ?></td>
                  <td><?php echo $row['city_id']; ?></td>
                  <td><?php echo $row['qualification']; ?></td>
                  <td><?php echo $row['image']; ?></td>
                  <td><?php echo $row['doi']; ?></td>
                  <td><?php echo $row['dou']; ?></td>

                  <td><?php if($row['is_active']==1){echo "Active";}else{echo "Blocked";} ?></td>

                  <td><a href="unactive_user.php?id=<?php echo $row['email_id'];?> && isactive=<?php echo $row['is_active']; ?>">Change</a></td>

                  <td><a href="delete_user.php?id=<?php echo $row['email_id']; ?> && isactive=<?php echo $row['is_active']; ?>">Delete</a></td> 
                </tr>
                <?php   
                  }
                }
                else
                {
                  // echo "0 Rows Returned!";
                }
                ?>
             </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM
        <!-- <a href="user_unactive.php"><input type="submit" class="btn btn-primary btn-block" value="Unactive"></a> -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>

</html>
