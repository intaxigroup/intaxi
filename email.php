<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@intaxi.si";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['company_name']) ||
        !isset($_POST['company_vat']) ||
        !isset($_POST['company_adress']) ||
        !isset($_POST['company_user']) ||
        !isset($_POST['company_user_email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $company_name = $_POST['company_name']; // required
    $company_vat = $_POST['company_vat']; // required
    $company_adress = $_POST['company_adress']; // required
    $company_user = $_POST['company_user']; // not required
    $company_user_email = $_POST['company_user_email']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$company_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$company_vat)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($string_exp,$company_adress)) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
	
  if(strlen($string_exp,$company_user)) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
	
  if(!preg_match($string_exp,$company_user_email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Ime podjetja: ".clean_string($company_name)."\n";
    $email_message .= "DŠ Podjetja: ".clean_string($company_vat)."\n";
    $email_message .= "Naslov Podjetja: ".clean_string($company_adress)."\n";
    $email_message .= "Ime in Priimek kontaktne osebe: ".clean_string($company_user)."\n";
    $email_message .= "Email kontaktne osebe: ".clean_string($company_user_email)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
