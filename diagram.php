<?php
$id=$_GET['id'];
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
/* img[usemap], map area{
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
                <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">
                                            <?php 
                                            if ($_GET['id']=="T_1") {
                                            ?><h4 class="card-title"><b>RO Section</b></h4>
                                            <?php }
                                            elseif ($_GET['id']=="T_2") {
                                            ?><h4 class="card-title"><b>Grasso Section</b></h4>
                                            <?php }
                                            elseif ($_GET['id']=="T_3") {
                                            ?><h4 class="card-title"><b>ECR Office</b></h4>
                                            <?php }
                                            elseif ($_GET['id']=="T_4") {
                                            ?><h4 class="card-title"><b>Lines Section</b></h4>
                                            <?php }
                                            elseif ($_GET['id']=="T_5") {
                                            ?><h4 class="card-title"><b>LP Air Compressors</b></h4>
                                            <?php }
                                            elseif ($_GET['id']=="T_6") {
                                            ?><h4 class="card-title"><b>HP Air Compressors</b></h4>
                                            <?php } 
                                            ?>
                                            </h4>
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
              </div>
              <!-- Page-header end -->
              <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                  <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                      <!-- Basic table card start -->
                       <div class="card" style="border-top:solid 5px #3f629d;overflow-x: auto;border-radius:10px; height:730px;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
                       <a href="oneline.php"><img src="assets/images/image.png" alt="" height="65px" width="auto" style="float:right; margin-top:15px; margin-left:95%; position:absolute"></a>
                        <div class="no-gutters box"   style="width: 1300px; height:730px; margin:auto">
                          
                            <?php
                                  if($_GET['id']=="T_1"){
                                     ?><img usemap="#workmap1"  class="map online_image"  src='assets\SLD\01.png'>
                                      <map name="workmap1">
                                      <area shape="circle" coords="780, 570, 45" href="meter_diagram.php?id=T_1&&meter=GW2_U8">
                                      <area shape="circle" coords="220, 570, 45" href="meter_diagram.php?id=T_1&&meter=GW2_U9">
                                      <area shape="circle" coords="400, 570, 45" href="meter_diagram.php?id=T_1&&meter=GW2_U10">
                                      <area shape="circle" coords="590, 570, 45" href="meter_diagram.php?id=T_1&&meter=GW1_U22">
                                      </map>
                                  <?php }
                                  elseif($_GET['id']=="T_2"){
                                   ?><img usemap="#workmap2" style="margin-top:-45px" class="map online_image" width="1300px" src='assets\SLD\02.png'>
                                   <map name="workmap2">
                                      <area shape="circle" coords="40, 584, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U19">
                                      <area shape="circle" coords="200, 690, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U18">
                                      <area shape="circle" coords="365, 584, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U17">
                                      <area shape="circle" coords="530, 690, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U16">
                                      <area shape="circle" coords="680, 584, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U15">
                                      <area shape="circle" coords="840, 690, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U20">
                                      <area shape="circle" coords="1000, 584, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U21">
                                      <area shape="circle" coords="1170, 690, 45" href="meter_diagram.php?id=T_2&&meter=GW1_U14">
                                 <?php }
                                 elseif($_GET['id']=="T_3"){
                                   ?><img usemap="#workmap3" class="map online_image" width="1300px" src='assets\SLD\03.png' style="margin-top:-45px">
                                   <map name="workmap3">
                                      <area shape="circle" coords="150, 600, 45" href="#">
                                      <area shape="circle" coords="310, 690, 45" href="#">
                                      <area shape="circle" coords="460, 600, 45" href="meter_diagram.php?id=T_3&&meter=GW1_U4">
                                      <area shape="circle" coords="620, 690, 45" href="#">
                                      <area shape="circle" coords="770, 600, 45" href="meter_diagram.php?id=T_3&&meter=GW1_U2">
                                      <area shape="circle" coords="920, 690, 45" href="meter_diagram.php?id=T_3&&meter=GW1_U3">
                                      <area shape="circle" coords="1070, 600, 45" href="meter_diagram.php?id=T_3&&meter=GW1_U5">
                                      </map>
                                   <?php }
                                   elseif($_GET['id']=="T_4"){
                                    ?><img usemap="#workmap4" class="map online_image" width="1250px" src='assets\SLD\04.png' style="margin-top:-45px">
                                    <map name="workmap4">
                                       <area shape="circle" coords="150, 660, 45" href="meter_diagram.php?id=T_4&&meter=GW1_U6">
                                       <area shape="circle" coords="325, 660, 45" href="meter_diagram.php?id=T_4&&meter=GW1_U7">
                                       <area shape="circle" coords="490, 660, 45" href="meter_diagram.php?id=T_4&&meter=GW2_U2">
                                       <area shape="circle" coords="680, 660, 45" href="#">
                                       <area shape="circle" coords="870, 660, 45" href="meter_diagram.php?id=T_4&&meter=GW1_U23">
                                       <area shape="circle" coords="1020, 660, 45" href="#">
                                       </map>
                                       <?php }

                                   elseif($_GET['id']=="T_5"){
                                    ?><img usemap="#workmap5" class="map online_image" width="1250px" src='assets\SLD\05.png'>
                                    <map name="workmap5">
                                      <area shape="circle" coords="260, 670, 45" href="meter_diagram.php?id=T_5&&meter=GW2_U12">
                                      <area shape="circle" coords="470, 670, 45" href="meter_diagram.php?id=T_5&&meter=GW2_U11">
                                      <area shape="circle" coords="690, 670, 45" href="meter_diagram.php?id=T_5&&meter=GW2_U14">
                                      <area shape="circle" coords="900, 670, 45" href="meter_diagram.php?id=T_5&&meter=GW2_U13">
                                    </map>
                                       <?php }
                                   elseif($_GET['id']=="T_6"){
                                    ?><img usemap="#workmap6" class="map online_image" width="1050px" src='assets\SLD\06.png' style="margin-left:190px;">
                                    <map name="workmap6">
                                       <area shape="circle" coords="340, 560, 45" href="meter_diagram.php?id=T_6&&meter=GW2_U3">
                                       <area shape="circle" coords="650, 560, 45" href="meter_diagram.php?id=T_6&&meter=GW2_U4">
                                    </map>
                                       <?php }
                                   ?>
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
    <?php include('includes/footer.php'); ?>
  </body>
</html>
<script>
    let link='diagram_data.php?id=<?php echo $_GET['id']; ?>';
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