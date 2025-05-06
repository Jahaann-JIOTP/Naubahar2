<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style> 
  #modal-content {
    opacity: 1;
}
#name, #email,#design, #mobile {
  width: 42%;
  padding: 12px 0px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #1976D2;
}
#email,#mobile{
  margin-left: 20px;
}
textarea{
  border: 1px solid #1976D2;
  width: 100%;
  height: 100px;
}

@media only screen and (min-width: 890px) {
.col-6{width: 25%;}
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

     <div class="modal fade" id="feedbackFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false"a>
    <!--Modal-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content" id="modal-content" style="border-radius: 10px !important;border: 2px solid #1976D2;;border-top: 5px solid #005794">
            <!-- Modal Header-->
            <div class="modal-header">
                <h3><i class="far fa-file-alt fa-1x mb-3 animated rotateIn icon1"></i> Feedback Request</h3>
                <button type="button" class="close" data-dismiss="modal" style="color: black;">&times;</button>
            </div>
            <div class="modal-body ">
                <h6 style="color: #12a3ce">Please help us to serve you better by taking a couple of minutes. </h6>
                <hr>                    
                <h4 id="sent-notification"></h4>
            <form id="myForm"  action="sendEmail.php" enctype="multipart/form-data" method="POST" onsubmit=" return check(this)">
                <input type="text" class="col-6" id="name" name="name" placeholder="Your Name" style="border: none;border-bottom: 1px solid #1976D2;" autocomplete="off"  required>
                <input id="email" name="email" type="email" class="col-6" placeholder="Your Email" autocomplete="off" required>
                <input id="design" name="design" type="text" class="col-6" placeholder="Your Designation" style="border: none;border-bottom: 1px solid #1976D2;" autocomplete="off"required>
                <input id="mobile" name="mobile" type="number" class="col-6" pattern="" placeholder="Mobile Number" autocomplete="off"required>
                <br><br>
             <div class="app">
              <h5>Is this a bug report, a suggestions, a modifications?</h5>
              <div class="container" style="display:inline-flex;">
                <div class="item" style="margin-left: 10px;">
                  <label for="">
                  <input  type="radio" name="radio" id="Bug Report" value="Bug Report">
                    Bug Report
                </label>
                </div>
                <div class="item"style="margin-left: 70px;">
                  <label for="">
                  <input  type="radio" name="radio" id="Suggestion" value="Suggestion">
                   Suggestion
                </label>
                </div>            
                <div class="item"style="margin-left: 100px;">
                  <label for="">
                  <input type="radio" name="radio" id=" Modifications" value="  Modifications">
                    Modifications
                </label>
                </div>                       
              </div>
            </div>
                <p style="color: #12a3ce">If this is a bug report, please provide full details of how to duplicate the problem you had.If this a suggestions or a modification, Please provide details below.</p>
                <textarea id="body" name="body" rows="5" placeholder="Type Message" required></textarea>
                <div>
                  <label>Attach file:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" />
                </div>
                <div class="modal-footer"> 
                 <button type="submit" class="btn btn-primary" value="Send An Email" style="color: white">Submit <i class="fa fa-paper-plane"></i></button>
                 <a href="" class="btn" data-dismiss="modal" style="color: #1976D2;">Cancel</a> </div>
            </form>
        </div>
    </div>
</div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
$(document).ready(function(){
    $("#myForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var ans1 = $("#name").val();
        var ans2 = $("#email").val();
        var ans3 = $("#design").val();
        // var ans4 = $("#mobile").val();
        if (ans1 != '' && ans2 != '' && ans3 != '') {
            // Optionally, fade out modal or show thank you message
            $("#feedbackFormModal").modal('hide'); // Close modal
            Swal.fire('Thank you for your feedback'); // Show thank you message
        }
    });
});

</script>
  <script src="/feedback/vendors/jquery/jquery-3.3.1.min.js"></script>
  <script src="/feedback/vendors/bootstrap/js/bootstrap.min.js"></script>
  <script src="/feedback/js/process-forms.js"></script>
  <script src="/feedback/js/main.js"></script>
  <script type="text/javascript" src="assets\js\sweetalert2.all.min.js"> </script>
  <script src="jquery-3.6.0.min.js"></script>