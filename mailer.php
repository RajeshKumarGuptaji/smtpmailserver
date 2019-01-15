<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php if(isset($_POST['sendmail'])){
		require 'PHPMailerAutoload.php';
		require 'details.php';

		$mail = new PHPMailer;

		$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = EMAIL;                 // SMTP username
		$mail->Password = PASS;                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom(EMAIL, 'Test Mailer');
		$mail->addAddress($_POST['email']);     // Add a recipient
		               // Name is optional
		$mail->addReplyTo(EMAIL);
		

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	}?>
<table width = "100%" height = "100%" border = "0" 
         cellpadding = "0" cellspacing = "0">
         <tr>
            <td align = "center">
               <form name = "filepost" method = "post" 
                  enctype = "multipart/form-data" id = "file">
                  
                  <table width = "300" border = "0" cellspacing = "0" 
                     cellpadding = "0">
							
                     <tr valign = "bottom">
                        <td height = "20">Your Name:</td>
                     </tr>
                     
                     <tr>
                        <td><input name = "from" type = "text" 
                           id = "from" size = "30"></td>
                     </tr>
                     
                     <tr valign = "bottom">
                        <td height = "20">Your Email Address:</td>
                     </tr>
                     
                     <tr>
                        <td class = "frmtxt2"><input name = "email"
                           type = "text" id = "emaila" size = "30"></td>
                     </tr>
                     
                     <!-- <tr>
                        <td height = "20" valign = "bottom">Attach File:</td>
                     </tr>
                     
                     <tr valign = "bottom">
                        <td valign = "bottom"><input name = "filea" 
                           type = "file" id = "filea" size = "16"></td>
                     </tr> -->
                     
                     <tr>
                        <td height = "40" valign = "middle"><input 
                           name = "Reset2" type = "reset" id = "Reset2" value = "Reset">
                        <input name = "sendmail" type = "submit" 
                           value = "Submit"></td>
                     </tr>
                  </table>
                  
               </form>
               
               <center>
                  <table width = "400">
                     
                     <tr>
                        <td id = "one">
                        </td>
                     </tr>
                     
                  </table>
               </center>
               
            </td>
         </tr>
      </table>
</body>
</html>