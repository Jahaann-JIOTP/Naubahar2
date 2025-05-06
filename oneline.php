<?php
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
?>
<!-- <style>
  img[usemap], map area{
    outline: auto !important;
}
</style> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
  <style type="text/css">
.box{
    position: relative;
    display: inline-block;
}
.box .text{
    position: absolute;
    z-index: 999;    
    text-align: center;
    font-size: 12px;
}
.font-features{
  color: black;
  font-weight: bold;
  font-size: 10px;
  font-family: 'Orbitron', sans-serif;
  padding-top: 8px;
  margin-bottom: 0rem !important;
}
.sld_font{
  color: black;
  font-size: 18px;
  font-family: 'Orbitron, sans-serif';
  padding-top: 8px;
  margin-bottom: 0rem !important;
}
.text_style{
  width: 180pt;
  height: 35pt;
  border-radius:3px;
  font-family: ''Orbitron', sans-serif';
}

.img_diagram{
    height:auto;
    width: 100%;
    overflow-x: scroll;
}
.hr_styling{
    border-bottom: 5px solid gray;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}
 /*img[usemap], map area{
    outline: auto !important;
  } */
  </style>
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
                                            <h4 class="m-b-10">Oneline Diagram</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Diagrams</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Oneline Diagram</a>
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
                      <div class="card" style="border-top:solid 5px #3f629d ;border-radius:10px !important; overflow:auto">
                        
                        <div class="no-gutters box" style="width:1400px;margin:auto;">
                          <img usemap="#workmap1" class="map" src='assets\SLD\0.png'>
                            <map name="workmap1">
                              <area shape="circle" coords="280, 150, 90" href="diagram.php?id=T_1">
                              <area shape="circle" coords="630, 150, 110" href="diagram.php?id=T_2">
                              <area shape="circle" coords="970, 150, 110" href="diagram.php?id=T_3">
                              <area shape="circle" coords="290, 430, 90" href="diagram.php?id=T_4">
                              <area shape="circle" coords="640, 430, 110" href="diagram.php?id=T_5">
                              <area shape="circle" coords="980, 430, 110" href="diagram.php?id=T_6">
                            </map>
                            <div id="refresh">
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
  </div>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
<script>
    let link='realtime.php';
    $(function () {
      $("#refresh").load(link);
       $(function() {
           $(document).on('click','.anchor',function (){
               console.log("abc");
               link=$(this).data('link');
               console.log(link);
               $("#refresh").load(link);
           });
       });
      setInterval(function(){
           $("#refresh").load(link)
       }, 10000);
    });
</script>