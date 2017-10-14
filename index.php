<?php /*
به نام خداوند بخشنده ی مهربان
@developer_001
@worldtm
*/
##------------------------------##
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->userame;
$text = $message->text;
$forward = $update->message->forward_from;
$reply = $update->message->reply_to_message;
$start = file_get_contents("Admin/Start.txt");
$help = file_get_contents("Admin/Help.txt");
$command = file_get_contents("Admin/Command.txt");
##------------------------------##
// Enable Plugins
##------------------------------##
include "Access.php";
include "Plugins/Admin.php";
include "Plugins/start-help.php";
include "Plugins/fun.php";
##------------------------------##
	##------------------------------##
$user = file_get_contents('Admin/Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Admin/Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Admin/Member.txt',$add_user);
    }unlink('error_log');
	##------------------------------##
	?>
