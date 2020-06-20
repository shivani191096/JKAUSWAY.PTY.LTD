<?php

include("includes/lib/functions/database.php");
include("includes/lib/classes/members.php");
require('includes/lib/functions/config.php');
require 'includes/lib/PHPMailer/PHPMailerAutoload.php';

$members 	= new members();

$action		= $_POST['action'];

if($action == 'signup') {

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $options = array();
    $error = '';

    $exist_email = $members->emailexist($email);

    if($exist_email > 0){
        $error = "Email is not available";
        $options['result'] = 'failed';
        $options['message'] = $error;
    } else {

        $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
        $permitted_sign = '!@#$%^&*~';
        $permitted_num = '1234567890';
        function generate_string($input, $strength = 16) {
            $input_length = strlen($input);
            $random_string = '';
            for($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            return $random_string;
        }

        $a = generate_string($permitted_chars, 4);
        $b = generate_string($permitted_sign,1);
        $c = generate_string($permitted_num,4);
        $pass = "$a$b$c";
        $password = md5($pass);

        $mail = new PHPMailer;

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;          // SMTP username
        $mail->Password = MAIL_PASSWORD; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

        $mail->From = SENDMAIL_FROM;
        $mail->FromName = "jkausway"; //To address and name
        $mail->addAddress($email, $fname);//Recipient name is optional
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = "Email Verification From jkausway";
        $mail->Body = "Verification Code from jkausway login Authentication below :\r\n";
        $mail->Body .= "<p><strong>$a$b$c</strong></p>";
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
            $add_member = $members->add($fname,$lname,$email,$password,$address,$phone);

            $options['result'] = 'success';
            $options['data'] = $add_member;
        }
        else {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $options['result'] = 'error';
            $options['data'] = '';
        }
    }
    echo json_encode($options);
    die();

}else if($action == 'login') {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $options = array();

    if(!empty($_POST['remember'])){
        setcookie ("u_name",$email);
        setcookie ("u_pass",md5($pass));
    }else{
        setcookie("u_name","");
        setcookie("u_pass","");
    }
        $password = md5($pass);
        $validae_login = $members->validate_user($email,$password);

        if($validae_login == $email){
            $_SESSION['email'] = $validae_login;
            $options['result'] = 'success';
            $options['data'] = $validae_login;
        }else{

        }

    echo json_encode($options);
    die();
}else if($action == 'change_pass'){

    $current_pass = $_POST['cur_pass'];
    $conf_pass = $_POST['conf_pass'];
    $options = array();
    $cur_pass = md5($current_pass);
    $cunfirm_pass = md5($conf_pass);

    $change_pass = $members->change_pass($cur_pass,$cunfirm_pass);

    if($change_pass == "1"){
        $options['result'] = 'error';
        $options['data'] = $change_pass;
    }else{
        $options['result'] = 'success';
        $options['data'] = $change_pass;
    }
    echo json_encode($options);
    die();
}else if($action == 'forgot_pass'){

    $email = $_POST['forgot_mail'];
    $options = array();

    $exist_email = $members->emailexist($email);

    if($exist_email == "1"){

        $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
        $permitted_sign = '!@#$%^&*~';
        $permitted_num = '1234567890';
        function generate_string($input, $strength = 16) {
            $input_length = strlen($input);
            $random_string = '';
            for($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            return $random_string;
        }

        $a = generate_string($permitted_chars, 4);
        $b = generate_string($permitted_sign,1);
        $c = generate_string($permitted_num,4);
        $pass = "$a$b$c";
        $password = md5($pass);

        $mail = new PHPMailer;

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;          // SMTP username
        $mail->Password = MAIL_PASSWORD; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

        $mail->From = SENDMAIL_FROM;
        $mail->FromName = "jkausway"; //To address and name
        $mail->addAddress($email, "jkausway");//Recipient name is optional
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = "Email Verification From jkausway";
        $mail->Body = "Verification Code from jkausway Reset Password Authentication below :\n";
        $mail->Body .= "Your Updated [from Database] Password :- \n";
        $mail->Body .= "<p><strong>$a$b$c</strong></p>";
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
            $add_member = $members->forgot_password($email,$password);

            $options['result'] = 'success';
            $options['data'] = $add_member;
        }
        else {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $options['result'] = 'error';
            $options['data'] = '';
        }

    }else{

    }
    echo json_encode($options);
    die();
}

