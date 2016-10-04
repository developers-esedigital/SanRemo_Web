<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "ns0.ovh.net";
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "ciao@sanremo-on.com";
$mail->Password = "Esedigital2015";
$mail->setFrom('ciao@sanremo-on.com', 'SanremoON');
$mail->addReplyTo('ciao@sanremo-on.com', 'SanremoON');
$mail->addAddress('esedigital8@gmail.com', 'Tester');
$mail->addAddress('dzamudio@esedigital.com.mx', 'Tester');
$mail->addBCC('facp0@hotmail.com','Lord');
$mail->Subject = 'Comentario de SanremoON';
$html = file_get_contents('templateEmail.html');
$html = str_replace('%nombre%',$_POST['nombre'], $html);
$html = str_replace('%apellido%',$_POST['cognome'], $html);
$html = str_replace('%email%',$_POST['email'], $html);
$html = str_replace('%nacionalidad%',$_POST['nacionalidad'], $html);
$html = str_replace('%comentarios%',$_POST['comentarios'], $html);
$mail->msgHTML($html);
// $mail->addAttachment('images/phpmailer_mini.png');
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
