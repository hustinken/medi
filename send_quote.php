<?php


$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$passenger=$_POST['passenger'];
$contact=$_POST['contact'];
$trip=$_POST['trip'];
$service=$_POST['service'];
$days=$_POST['days'];
$message=$_POST['message'];


//send email begin
$smtphost='smtp.office365.com'; //'smtpout.secureserver.net';
$smtpusername='kehinde@tecnoverse.com';
$smtppassword='hustinken';
$smtpport=587; //465;
$smtpport=587; //465;
$userfullname=$name;

$to='ayodelelawrence@gmail.com'; //'ayodelelawrence@gmail.com'; //'drhustinken2@gmail.com';
$subject = 'REQUEST FOR QUOTE';
$messages= 'kindly find below request for quotation<br/>,
<br><b>Name: </b>'.$name.'<br/>
<br><b>Email: </b>'.$email.'<br/>
<br><b>Phone Number: </b>'.$phone.'<br/>
<br><b>Number of Patients/Travelers: </b>'.$passenger.'<br/>
<br><b>Preferred Method of Contact: </b>'.$contact.'<br/>
<br><b>Country of Residence: </b>'.$trip.'<br/>
<br><b>Desired Service: </b>'.$service.'<br/>
<br><b>Estimated No of Days: </b>'.$days.'<br/>
<br><b>Message: </b>'.$message.'<br/>';

$datetime=date("Y-m-d-h-i-s-a");

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $smtphost;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $smtpusername;                 // SMTP username
$mail->Password = $smtppassword;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $smtpport;                                    // TCP port to connect to

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);


$mail->setFrom($smtpusername, $userfullname);
$mail->AddAddress($to);
$mail->addReplyTo($email, $userfullname);
$mail->WordWrap = 50;   
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = 'Hello,<br/>'.$messages.'<br/> This Mail Was Sent On '.$datetime;
$mail->send();
/* if(!$mail->send()){
    echo 'Not Working';
}else{echo 'Worked!!!!!'; }*/


//send email ends
//@mail($to,$subject,$messages,$subject);

echo json_encode(array("response" => "1", "message" => $message)); 

?>