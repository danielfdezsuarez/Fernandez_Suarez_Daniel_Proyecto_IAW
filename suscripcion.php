
<?php
$to = "danifer91_15@hotmail.com";
$subject = "prueba";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>

<!--
con smtp.gmail.com

[Sun Feb 26 19:51:26.260131 2017] [:error] [pid 132:tid 1160] [client ::1:52266] PHP Warning:  mail(): SMTP server response: 530 5.7.0 Must issue a STARTTLS command first. d6sm11183864wmd.6 - gsmtp in C:\\Bitnami\\wampstack\\apache2\\htdocs\\proyecto\\Fernandez_Suarez_Daniel_Proyecto_IAW\\suscripcion.php on line 35, referer: http://localhost/proyecto/Fernandez_Suarez_Daniel_Proyecto_IAW/resultado.php?id=656
-->