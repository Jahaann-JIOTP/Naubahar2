<?php
include("insert2.php");

?>
<style type="text/css">
    /* For mobile phones: */
    @media only screen and (max-width: 480px) {
        .modal-body {
            position: relative;
            max-height: 300px;
            overflow-y: auto;
        }

        .modal {
            width: 95%;
        }
    }
</style>
<!-- Edit -->
<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:10px ;">
            <div class="modal-header bg-primary" style="border-radius:10px ; height:40px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </center>
            </div>
              <form method="POST" action="insert2.php">
            <div class="modal-body">
                <?php
                $edit = mysqli_query($con, "select * from terif2 where id='" . $row['id'] . "'");
                $row = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">

                  
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">January</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" autocomplete="off" name="January" class="form-control" value="<?php echo $row["January"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">February</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" autocomplete="off" name="February" class="form-control" value="<?php echo $row["February"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">March</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" autocomplete="off" name="March" class="form-control" value="<?php echo $row["March"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">April</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" autocomplete="off" name="April" class="form-control" value="<?php echo $row["April"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">May</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="May" autocomplete="off" type="text" class="form-control" value="<?php echo $row["May"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">June</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="June" autocomplete="off" type="text" class="form-control" value="<?php echo $row["June"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">July</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="July" autocomplete="off" type="text" class="form-control" value="<?php echo $row["July"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">August</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="August" autocomplete="off" type="text" class="form-control" value="<?php echo $row["August"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">September</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="September" autocomplete="off" type="text" class="form-control" value="<?php echo $row["September"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">October</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="October" autocomplete="off" type="text" class="form-control" value="<?php echo $row["October"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">November</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="November" autocomplete="off" type="text" class="form-control" value="<?php echo $row["November"]; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="position:relative; top:7px;">December</label>
                            </div>
                            <div class="col-lg-6">
                                <input name="December" autocomplete="off" type="text" class="form-control" value="<?php echo $row["December"]; ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-check"></span>
                    Save</button>

            </div>

            </form>
        </div>
    </div>
</div>
