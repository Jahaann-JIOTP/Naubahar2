<?php
    header("location:home.php");
    ?>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];    
        $folder = "Action/uploads/".$filename; 
        $name   = $_POST['name'];
        $email  = $_POST['email'];
        $design = $_POST['design'];
        $mobile = $_POST['mobile'];
        $body   = $_POST['body'];
        if(!empty($_POST['radio']))
        $radio  =$_POST['radio'];

        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
            // header("location:plant_summary.php");
        }

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "mehwish.arshad@jiotp.com"; //enter you email address
        $mail->Password = 'Mehwisharshad124@'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        //Email Settings
        $mail->isHTML(true);  
        $mail->setFrom("mehwish.arshad@jiotp.com","Naubahar");
        // $mail->AddAddress('jamal@sahamid.com');
        // $mail->AddAddress('irtiza.hassan@sahamid.com');
        $mail->AddAddress('muhammad.numan@jiotp.com');
        $mail->AddAddress('mehwish.arshad@jiotp.com');
        // $mail->AddAddress('imran.qureshi@sahamid.com');
        $mail->Subject = "Feedback Report";
        $mail->Body .="<br>Name: " . $name;
        $mail->Body .="<br>Email: " . $email;
        $mail->Body .="<br>Designation: " . $design;
        $mail->Body .="<br>Contact Number: " . $mobile;
        $mail->Body .="<br>Nature of Report: " . $radio;
        $mail->Body .="<br>Feedback: " . $body;
        $mail->AddAttachment($folder);
    
        if ($mail->send()) {
            // $status = "success";
            // $response = "Email is sent!";
        } else {
            // $status = "failed";
            // $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
        // exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
