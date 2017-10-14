<?php
include "../Access.php";
include "../index.php";

if(preg_match('/^\/([Ll]ogo) (.*)/s',$text)){
	$text = str_replace('/Logo ','',$text);
	$text = str_replace('/logo ','',$text);
	$photo = file_get_contents("http://worldtm.teleagent.uk/api/logo/?bg=http://up2www.com/uploads/4b1adownload-3-.jpg&fsize=69&ht=100&wt=50&RO=0&color=white&lang=en&text=".urlencode($text));
	file_put_contents('Admin/Logo.png',$photo);
	SendPhoto($chat_id , new CURLFILE('Admin/Logo.png'),"@worldtm");
  }
    if(preg_match('/^\/([Pp]hoto)/',$text) and $reply){
    if($reply->sticker){
      $file = $reply->sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Admin/Sticker.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
      SendPhoto($chat_id , new CURLFile('Admin/Sticker.png') , "@worldtm");
    }
  }
  if(preg_match('/^\/([Ww]eb[Ss]hot) (.*)/s',$text)){
	preg_match('/^\/([Ww]eb[Ss]hot) (.*)/s',$text,$match);
	$photo = file_get_contents('http://api.screenshotmachine.com/?key=b645b8&size=X&url='.$match[2]);
	file_put_contents('Admin/webshot.png',$photo);
	SendPhoto($chat_id , new CURLFILE('Admin/webshot.png'),"@worldtm");
  }
    if(preg_match('/^\/([Ss]ticker)/',$text) and $reply){
    if($reply->photo){
	  $photo = $reply->photo;
      $file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Admin/Photo-S.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
      SendSticker($chat_id , new CURLFile('Admin/Photo-S.png') , "@worldtm");
    }
  }
  if(preg_match('/^\/([Ss]hort) (.*)/s',$text)){
	preg_match('/^\/([Ss]hort) (.*)/s',$text,$match);
	SendAction($chat_id,'typing');
	$short = file_get_contents("http://yeo.ir/api.php?url=".$match[2]);
	if($short == 'Error: Invalid Url!'){
	SendMessage($chat_id , "Error: Invalid Url!","html");
	}else{
	SendMessage($chat_id , "لینک کوتاه شده: $short","html");
	}
  }
if(preg_match('/^\/([Tt]raffic) (.*)/s',$text)){
	$text = str_replace('/Traffic ','',$text);
	$text = str_replace('/traffic ','',$text);
	$photo = file_get_contents("http://api.worldtm.teleagent.uk/traffic?city=".urlencode($text));
	file_put_contents('Admin/traffic.png',$photo);
	SendPhoto($chat_id , new CURLFILE('Admin/traffic.png'),"@worldtm");
  }
  if(preg_match('/^\/([Qq]r) (.*)/s',$text)){
    preg_match('/^\/([Qq]r) (.*)/s',$text,$match);
    file_put_contents('Admin/Poster.jpg',file_get_contents('https://api.qrserver.com/v1/create-qr-code/?size=500x500&data='.urlencode($match[2])));
	SendPhoto($chat_id , new CURLFile('Admin/Poster.jpg'),"@worldtm");
  }
  if(preg_match('/^\/([Ll]ocation) (.*)/s',$text)){
	preg_match('/^\/([Ll]ocation) (.*)/s',$text,$match);
	$location = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".$match[2]));
	bot('sendLocation',[
    'chat_id'=>$chat_id,
    'latitude'=>$location->results[0]->geometry->location->lat,
	'longitude'=>$location->results[0]->geometry->location->lng
  ]);
  }
    if(preg_match('/^\/([Rr]andpass) (.*)/s',$text)){
	preg_match('/^\/([Rr]andpass) (.*)/s',$text,$match);
	SendAction($chat_id,'typing');
	$rand = file_get_contents("http://api.worldtm.teleagent.uk/randpass?num=".$match[2]);
	if($short == 'Error: Invalid Url!'){
	SendMessage($chat_id , "Error: Invalid Url!","html");
	}else{
	SendMessage($chat_id , "پسورد شما:\n$rand","html");
	}
  }
  ?>
