<?php
    $msg = '';
    $msgClass = '';
    if(filter_has_var(INPUT_POST, 'submit')) {
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(!empty($name) && !empty($email) && !empty($message) ) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = 'Please enter a valid email';
                $msgClass = 'red';
            } else {
                $toEmail= 'info@tejendersingh.com';
                $subject= 'New message from '.$name;
                $body= '<h2>Contact Request</h2>
                    <h4>Name </h4><p>'.$name.'</p>
                    <h4>Email </h4><p>'.$email.'</p>
                    <h4>Message </h4><p>'.$message.'</p>
                ';
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-Type: text/html; xharset=UTF-8" ."\r\n";
                $headers .= "From: " .$name. "<".$email.">". "\r\n";
                if(mail($toEmail, $subject, $body, $headers)) {
                    $msg = 'Your email has been sent';
                    $msgClass = 'teal';
                    header("location: ../index.html");
                } else {
                    $msg = 'Your email was not sent';
                    $msgClass = 'red';
                }
            }
        } else {
            $msg = 'Please fill in all fields';
            $msgClass = 'red';
        }
    }
?>
