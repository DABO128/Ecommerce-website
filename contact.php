
<?php
 
$name =$_POST['name'];
$visitor_email =$_POST['email'];
$message =$_POST['message'];

$email_from = 'oumaroud195@gmail.com';
$email_subject ="New Form Submission";
$email_body = "User Name: $name.\n".
                "User Email:$visitor_email.\n".
                    "User Message: $message.\n";


$to ="daboomar268@gmail.com";
$headers = "From: $email_from\r\n";
$headers = "Reply-To: $visitor_email\r\n";
mail($to,$email_subject,$email_body,$headers);

if(@mail($emailRecipient, $subject, $message, $headers))
{
  echo "Mail Sent Successfully";
}else{
  echo "Mail Not Sent";
}

header("Location:contact_form.php");

 
?>
