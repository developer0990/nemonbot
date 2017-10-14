<?php
include "../Access.php";
include "../index.php";
if($text == "/start"){
	SendAction($chat_id,'typing');
	SendMessage($chat_id , $start , "html");
}
if($text == "/help"){
	SendAction($chat_id,'typing');
	SendMessage($chat_id , $help , "html");
}

?>
