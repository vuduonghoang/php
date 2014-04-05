<?php
function SendEmail ($from, $to, $subject, $message)
{
	$headers = "From: MarketoHome System ";
	$headers .= "<".$from.">\n";
	$headers .= "X-Sender: <".$from.">\n"; 
	$headers .= "X-Mailer: PHP\n"; 
	$headers .= "X-Priority: 1\n"; 
	$headers .="Return-Path:<".$from.">\n";  
	$headers .= "Content-Type: text/html; ";
	$headers .= "charset=UTF-8\n";
	if($to !="" && $subject !="")
		return mail($to,$subject,$message,$headers);
	else
		return false;
}
?>
