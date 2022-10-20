<?php
session_start();
$mail=$_SESSION["mail"];
?>
<?php
require '../../creartdemo1/database.php';
$qry = "SELECT * FROM expert_tbl WHERE user_id='". $mail ."'";
$rs = mysqli_query($conn,$qry);
if(mysqli_num_rows($rs) > 0)
{
  while($row = mysqli_fetch_assoc($rs))
  {
    $skill=$row['expert_key_skills'];
    if($skill!=NULL)
    {
      header('location:expert_gender.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Expert Skills - Ask Me</title>
</head>

  <?php
    require 'link.html';
  ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Ask Me</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php
        require 'link.php';
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
          
          <?php
            require '../../creartdemo1/database.php';
            $qry = "SELECT * FROM user_tbl WHERE email_id='". $mail ."'";
            $rs = mysqli_query($conn,$qry);
            if(mysqli_num_rows($rs) > 0)
            {
              while($row = mysqli_fetch_assoc($rs))
              {
          ?>
    
          <form method="post" action="expert_skills_code.php">

                <div class="col-md-6">

                <label for="exampleInputName3">Email Id</label>
                <input class="form-control" id="exampleInputName3" type="text" aria-describedby="nameHelp" name="txt_em" readonly value="<?php echo $row['email_id']; ?>"></div><br>

                <div class="col-md-6">
                <label for="exampleInputName">Enter Your Skills</label>
                <textarea row="50" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="txt_skill" placeholder="Enter Your Skills" pattern="[A-Za-z ]{1,15}" title="Enter Proper Skills" required></textarea></div><br>


                <div class="col-md-6">
                <label for="exampleInputName">Enter Your Descripation</label>
                <textarea row="50" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="txt_desc" placeholder="Enter Your Descripation" pattern="[A-Za-z ]{1,15}" title="Enter Proper Descripation" required></textarea><br>

                <input type="submit" class="btn btn-primary btn-block" name="btn_add_skill" value="Done"><br>

                <center><h3><a href="expert_edit_profile.php">Skip >></a></h3></center>
                <center><h3><a href="expert_gender.php">Next >></a></h3></center>
                </div>
            </form>
                         
          <?php
              }
            }
          ?>

          </div>
          </div>
    </div>
  </div>
      
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
            <a class="btn btn-primary" href="../login1.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>