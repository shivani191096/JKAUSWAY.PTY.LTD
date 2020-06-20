<?php

include("includes/lib/functions/database.php");
include("includes/lib/classes/contact_us.php");
require('includes/lib/functions/config.php');
require 'includes/lib/PHPMailer/PHPMailerAutoload.php';

$contact_us	= new contact_us();

$action		= $_POST['action'];

if($action == 'contact_us') {


    $data['full_name'] = $_POST['inputFullName'];
    $data['contact_mail']= $_POST['inputEmail'];
    $data['phone'] = $_POST['inputPhone'];
    $data['company'] = $_POST['inputCompany'];
    $data['postcode'] = $_POST['inputPostcode'];
    $data['state'] = $_POST['selectState'];
    $data['message'] = $_POST['textarea'];
    if(empty($_POST['inputSubscribe'])){
        $sub = "No";
    }else{
        $sub = "Yes";
    }
    $data['subscribe'] = $sub;
    if(empty($_POST['inputUnsubscribe'])){
        $unsub = "No";
    }else{
        $unsub = "Yes";
    }
    $data['unsubscribe'] = $unsub;

    $add_contact = $contact_us->add($data);

    $ticket = str_pad($add_contact,6,"0",STR_PAD_LEFT);

    $options = array();
    $error = '';

        $mail = new PHPMailer;

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;          // SMTP username
        $mail->Password = MAIL_PASSWORD; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

        $mail->From = SENDMAIL_FROM;
        $mail->FromName = "JK Ausway Pvt Ltd"; //To address and name
        $mail->addAddress($data['contact_mail'], $data['full_name']);//Recipient name is optional
        $mail->isHTML(true);
        $mail->Subject = "[#CQ".$ticket."]"."Your Support Request";
        $mail->Body = '<html><body>';
        $mail->Body .= "<h2>Dear Customer,</h2>";
        $mail->Body .= '<p style="color:#000;font-size:15px;">Your Support request was received and will be answered in the order it was received.</p>';
        $mail->Body .= '<p style="color:#000;font-size:15px;">Please collect your Ticket:-<br/><strong style="font-size: 18px;">#CQ'.$ticket.'</strong></p>';
        $mail->Body .= '<p style="color:#000;font-size:15px;">Regards,</p>';
        $mail->Body .= '<strong style="color:#000;font-size:16px;">JK Ausway Pvt Ltd</strong>';
        $mail->Body .= '</body></html>';
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
            $mail->ClearAllRecipients();
            $mail->From = SENDMAIL_FROM;
            $mail->FromName = "JK Ausway Pvt Ltd"; //To address and name
            $mail->addAddress(SENDMAIL_TO_ADMIN,'Admin');
            $mail->isHTML(true);
            $mail->Subject = "Enquiry";
            $mail->Body = '<html><body>';
            $mail->Body .= "<h2>Dear Admin,</h2>";
            $mail->Body .= '<p style="color:#000;font-size:15px;">Mr./Mrs. <strong>'.$data["full_name"].',</strong> has sent to enquiry. Here are the details:-</p>';
            $mail->Body .= "<table>
                    <tbody>
                    <div class='row'>
                        <div class='col-6'>
                            <tr>
                                <td style='width:150px'><strong>Ticket No.:- </strong></td>
                                <td style='width:400px'>#CQ$ticket</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Full Name:- </strong></td>
                                <td style='width:400px'>".$data['full_name']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Email Address:- </strong></td>
                                <td style='width:400px'>".$data['contact_mail']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Phone Number:- </strong></td>
                                <td style='width:400px'>".$data['phone']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Company:- </strong></td>
                                <td style='width:400px'>".$data['company']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Postcode:- </strong></td>
                                <td style='width:400px'>".$data['postcode']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>State:- </strong></td>
                                <td style='width:400px'>".$data['state']."</td>
                            </tr>
                        </div>
                         <div class='col-6'>
                            <tr>
                                <td style='width:150px'><strong>Message to Jk Ausway Pvt Ltd Customer Service:- </strong></td>
                                <td style='width:400px'>".$data['message']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Subscribe Today:- </strong></td>
                                <td style='width:400px'>".$data['subscribe']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong> Unsubscribe:- </strong></td>
                                <td style='width:400px'>".$data['unsubscribe']."</td>
                            </tr>
                        </div>
                    </div>
                    </tbody>
                </table><br/>";
            $mail->Body .= '<p><strong style="color:#000;font-size:15px;">Thank you for getting in touch!</strong></p>';
            $mail->Body .= '</body></html>';
            $mail->AltBody = "This is the plain text version of the email content";
            if($mail->send()) {
                $options['result'] = 'success';
            }else {
                echo "Mailer Error: " . $mail->ErrorInfo;
                $options['result'] = 'error';
            }
        }
        else {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $options['result'] = 'error';
        }
    echo json_encode($options);
    die();
}elseif ($action == 'free_quote'){

    $data['full_name'] = $_POST['inputFullName'];
    $data['email']= $_POST['inputEmail'];
    $data['quote_name'] = $_POST['inputName'];
    $data['postcode'] = $_POST['inputPostcode'];
    $data['state'] = $_POST['inputState'];
    $data['phone'] = $_POST['inputPhone'];

    $add_quote = $contact_us->add_quotes($data);
    $quote_ticket = str_pad($add_quote,6,"0",STR_PAD_LEFT);
    $options = array();
    $error = '';

    $mail = new PHPMailer;

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = MAIL_HOST;             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = MAIL_USERNAME;          // SMTP username
    $mail->Password = MAIL_PASSWORD; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;

    $mail->From = SENDMAIL_FROM;
    $mail->FromName = "JK Ausway Pvt Ltd"; //To address and name
    $mail->addAddress($data['email'], $data['full_name']);//Recipient name is optional
    $mail->isHTML(true);
    $mail->Subject = "[#FQ".$quote_ticket."] "."Get Free Quote";
    $mail->Body = '<html><body>';
    $mail->Body .= "<h2>Dear Customer,</h2>";
    $mail->Body .= '<p style="color:#000;font-size:15px;">Your Support request was received and will be answered in the order it was received.</p>';
    $mail->Body .= '<p style="color:#000;font-size:15px;">Please collect your Quote Ticket:-<br/><strong style="font-size: 18px;">#FQ'.$quote_ticket.'</strong></p>';
    $mail->Body .= '<p style="color:#000;font-size:15px;">Regards,</p>';
    $mail->Body .= '<strong style="color:#000;font-size:16px;">JK Ausway Pvt Ltd</strong>';
    $mail->Body .= '</body></html>';
    $mail->AltBody = "This is the plain text version of the email content";
    if($mail->send())
    {
        $mail->ClearAllRecipients();
        $mail->From = SENDMAIL_FROM;
        $mail->FromName = "JK Ausway Pvt Ltd"; //To address and name
        $mail->addAddress(SENDMAIL_TO_ADMIN,'Admin');
        $mail->isHTML(true);
        $mail->Subject = "Get Free Quote";
        $mail->Body = '<html><body>';
        $mail->Body .= "<h2>Dear Admin,</h2>";
        $mail->Body .= '<p style="color:#000;font-size:15px;">Mr./Mrs. <strong>'.$data["full_name"].',</strong> has sent to Free Quote. Here are the details:-</p>';
        $mail->Body .= "<table>
                    <tbody>
                        <div class='col-6'>
                            <tr>
                                <td style='width:150px'><strong>Quote Ticket No.:- </strong></td>
                                <td style='width:400px'>#FQ$quote_ticket</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Full Name:- </strong></td>
                                <td style='width:400px'>".$data['full_name']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Email Address:- </strong></td>
                                <td style='width:400px'>".$data['email']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Name:- </strong></td>
                                <td style='width:400px'>".$data['quote_name']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Postcode:- </strong></td>
                                <td style='width:400px'>".$data['postcode']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>State:- </strong></td>
                                <td style='width:400px'>".$data['state']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Phone Number:- </strong></td>
                                <td style='width:400px'>".$data['phone']."</td>
                            </tr>
                        </div>
                    </tbody>
                </table><br/>";
        $mail->Body .= '<p><strong style="color:#000;font-size:15px;">Thank you for getting in touch!</strong></p>';
        $mail->Body .= '</body></html>';
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send()) {
            $options['result'] = 'success';
        }else {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $options['result'] = 'error';
        }
    }
    else {
        echo "Mailer Error: " . $mail->ErrorInfo;
        $options['result'] = 'error';
    }
    echo json_encode($options);
    die();
}elseif ($action == 'req_quote'){

    $data['security'] = $_POST['selectSecurity'];
    $data['budget']= $_POST['selectBudget'];
    $data['email'] = $_POST['inputEmail'];

    $add_req_quotes = $contact_us->add_req_quotes($data);

    $req_quote_ticket = str_pad($add_req_quotes,6,"0",STR_PAD_LEFT);
    $options = array();
    $error = '';

    $mail = new PHPMailer;

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = MAIL_HOST;             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = MAIL_USERNAME;          // SMTP username
    $mail->Password = MAIL_PASSWORD; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;

    $mail->From = SENDMAIL_FROM;
    $mail->FromName = "JK Ausway Pvt Ltd"; //To address and name
    $mail->addAddress($data['email'], 'Customer');//Recipient name is optional
    $mail->isHTML(true);
    $mail->Subject = "[#RQ".$req_quote_ticket."] "."Get Request Quote";
    $mail->Body = '<html><body>';
    $mail->Body .= "<h2>Dear Customer,</h2>";
    $mail->Body .= '<p style="color:#000;font-size:15px;">Your Support request was received and will be answered in the order it was received.</p>';
    $mail->Body .= '<p style="color:#000;font-size:15px;">Please collect your Request Quote Ticket:-<br/><strong style="font-size: 18px;">#RQ'.$req_quote_ticket.'</strong></p>';
    $mail->Body .= '<p style="color:#000;font-size:15px;">Thank you for your time any your business, and let us know if there is anything else you need.<br/>We will soon reflect this mail from our Administrator Department.</p>';
    $mail->Body .= '<p style="color:#000;font-size:15px;">Regards,</p>';
    $mail->Body .= '<strong style="color:#000;font-size:16px;">JK Ausway Pvt Ltd</strong>';
    $mail->Body .= '</body></html>';
    $mail->AltBody = "This is the plain text version of the email content";
    if($mail->send())
    {
        $mail->ClearAllRecipients();
        $mail->From = SENDMAIL_FROM;
        $mail->FromName = "JK Ausway Pvt Ltd"; //To address and name
        $mail->addAddress(SENDMAIL_TO_ADMIN,'Admin');
        $mail->isHTML(true);
        $mail->Subject = "Request Free Quote";
        $mail->Body = '<html><body>';
        $mail->Body .= "<h2>Dear Admin,</h2>";
        $mail->Body .= '<p style="color:#000;font-size:15px;">Customer has sent to Request A Quotes. Here are the details:-</p>';
        $mail->Body .= "<table>
                    <tbody>
                        <div class='col-6'>
                            <tr>
                                <td style='width:150px'><strong>Quote Ticket No.:- </strong></td>
                                <td style='width:400px'>#RQ$req_quote_ticket</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Email Address:- </strong></td>
                                <td style='width:400px'>".$data['email']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Security For:- </strong></td>
                                <td style='width:400px'>".$data['security']."</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Budget:- </strong></td>
                                <td style='width:400px'>".$data['budget']."</td>
                            </tr>
                        </div>
                    </tbody>
                </table><br/>";
        $mail->Body .= '<p><strong style="color:#000;font-size:15px;">Thank you for getting in touch!</strong></p>';
        $mail->Body .= '</body></html>';
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send()) {
            $options['result'] = 'success';
        }else {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $options['result'] = 'error';
        }
    }
    else {
        echo "Mailer Error: " . $mail->ErrorInfo;
        $options['result'] = 'error';
    }
    echo json_encode($options);
    die();
}