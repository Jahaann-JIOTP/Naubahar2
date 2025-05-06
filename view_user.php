<?php
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>
</head>

<body>
  <!-- Pre-loader start -->
  <?php include('includes/preloader.php'); ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <?php include('includes/header.php'); ?>
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          <?php include('includes/sidebar.php'); ?>
          <div class="pcoded-content">
            <!-- Page-header start -->
            <div class="page-header">
              <div class="page-block">
                <div class="row align-items-center">
                  <div class="col-md-8">
                    <div class="page-header-title">
                      <h4 class="m-b-10">View User</h4>
                      <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                        <a href="#"> <i class="fa fa-home"></i> </a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">User Management</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">View User</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page-header end -->
            <div class="pcoded-inner-content">
              <!-- Main-body start -->
              <div class="main-body">
                <div class="page-wrapper">
                  <!-- Page-body start -->
                  <div class="page-body">
                    <!-- Basic table card start -->
                    <center>
                      <div id="hide">
                        <h4 style="color: #4ECDC4;"><?php
                                                    if (isset($_SESSION['sucessfully'])) {
                                                    ?>
                            <div id="alert" class="alert alert-primary alert-dismissible fade show" role="alert">
                              <strong><?php echo $_SESSION['sucessfully']; ?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <?php
                                                      unset($_SESSION['sucessfully']);
                                                    }
                          ?>
                        </h4>
                      </div>
                    </center>
                    <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                      <div class="card-header" style="height: 50px;">
                        <h4>View User</h4>
                        <!-- <div class="card-header-right" >
                                <ul class="list-unstyled card-option">
                                  <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                  <li><i class="fa fa-window-maximize full-card"></i></li>
                                  <li><i class="fa fa-minus minimize-card"></i></li>
                                  <li><i class="fa fa-refresh reload-card"></i></li>
                                  <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                              </div> -->
                      </div>
                      <div class="card-block table-border-style">
                        <div class="table-responsive">
                          <table class="table table-hover text-nowrap">
                            <thead>
                              <tr align="center">
                                <th scope="col" style="text-align: center;"><i class="fa fa-hashtag"></i> Sr No</th>
                                <th scope="col" style="text-align: center;"><i class="fa fa-user"></i> Name</th>
                                <th scope="col" style="text-align: center;"><i class="fa fa-envelope"></i> Email</th>
                                <th scope="col" style="text-align: center;"><i class="fa fa-lock"></i> Password</th>
                                <th scope="col" style="text-align: center;"><i class=" fa fa-male"></i> User Type</th>
                                <!-- <th scope="col" style="text-align: center;"><i class=" fa fa-check"style="color: red"></i> Status</th> -->
                                <th scope="col" style="text-align: center;"> <i class="fa fa-tasks"></i> Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              include('Action/connection.php');
                              $query = mysqli_query($con, "select * from `accounts`");
                              $i = 1;
                              while ($row = mysqli_fetch_array($query)) {
                              ?>
                                <tr align="center">
                                  <th scope="row" style="text-align: center;"><?php
                                                                              echo $i; ?></th>
                                  <td><?php echo $row["name"]; ?></td>
                                  <td><?php echo $row["email"]; ?></td>
                                  <td><?php echo $row["pass"]; ?></td>
                                  <td><?php echo $row["user_level"]; ?></td>
                                  <!-- <td><?php //echo $row["status"];
                                            ?></td> -->
                                  <td>
                                    <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn" style="background-color: #3e8fc6;color:white"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                                    <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class='btn' style="background-color:#d64d3d;color:white"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                    <?php include('Modal.php'); ?>
                                  </td>
                                </tr>
                              <?php
                                $i++;
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="styleSelector">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('includes/footer.php'); ?>
</body>

</html>
<script type="text/javascript">
  // close the div in 5 secs
  setTimeout(function() {
    $('#hide').fadeOut('1500');
  }, 5000);
</script>