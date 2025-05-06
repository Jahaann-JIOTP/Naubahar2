<style type="text/css">
    /* For mobile phones: */
    @media only screen and (max-width: 480px) {
        .modal-body {
            position: relative;
            max-height: 200px;
            overflow-y: auto;
        }

        .modal {
            width: 95%;
        }
    }
</style>
<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </center>
            </div>
            <div class="modal-body">
                <?php
                $del = mysqli_query($con, "select * from accounts where id='" . $row['id'] . "'");
                $row = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h6>
                        <center>Are you sure to delete <strong><?php echo $row['name']; ?></strong> from the list? </center>
                    </h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="Action/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </center>
            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($con, "select * from accounts where id='" . $row['id'] . "'");
                $row = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" action="Action/edit.php?id=<?php echo $row['id']; ?>">
                        <div style="height:10px;"></div>
                        <div class="row" style="display:none">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Id:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">User Name:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Email:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Password:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="password" name="password" class="form-control" id="myInput" value="<?php echo $row['pass']; ?>">
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">User Type:</label>
                            </div>
                            <div class="col-lg-10">
                                <input name="type" type="text" class="form-control" value="<?php echo $row['user_level']; ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<!-- /.modal -->