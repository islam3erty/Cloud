<?php 

ob_start();

$API_KEY = 'YOUR TOKEN';
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$ali = file_get_contents("data/$from_id/ali.txt");
$ADMIN = 398426298;
$to =  file_get_contents("data/$from_id/token.txt");
$url =  file_get_contents("data/$from_id/url.txt");
$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username; 
$from_id = $message->from->id;
$ch = "@OneMeeting";
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"- عذراً ،يجب عليك الأنضمام لقناة البوت لتستطيع إستخدامه 👻💜.
- [لـِقـآء - Meeting 💛](t.me/meeting_02)",'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
]);return false;}

if($text=="/help" ){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- يمكنك إستخدام هذا البوت لإجراء عملية إتصال بوتك بالأتستضافة وحذف الأتصال وإستخراج معلومات أي بوت عن طريق إستخدام رمز الوصول الخاص بالبوت.

- Programmer : 🅢 🅘 🅜 🅞",
'reply_to_message_id'=>$mid,
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"🅢 🅘 🅜 🅞", 'url'=>"t.me/ForSomeoneBot"]]
    ]

  ])
  ]);
}


if($text == "/start"){
if (!file_exists("data/$from_id/ali.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/ali.txt","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
    
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• مرحبا بك في بوت عمل ويب هوك ✔️ وحذف ويب هوك ✖️ بالأضافة إلى إستخراج معلومات التوكن ➕ •
	 
	 - للمعلومات والتبليغ عن مشكلة /help .",
        'parse_mode'=>'MarkDown',
        'disable_web_page_preview'=>true,
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"• عمل ويب هوك ✔️ •"],['text'=>"• معلومات التوكن ➕ •"]],
	[['text'=>"• حذف ويب هوك ✖️ •"]]
	]
	])
	]);
	}
elseif($text == "• العودة 🔙 •"){
file_put_contents("data/$from_id/ali.txt","no");
file_put_contents("data/$from_id/token.txt","no");
file_put_contents("data/$from_id/url.txt","no");
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• تم الرجوع إلى القائمة الرئيسية 🔚 •",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"• عمل ويب هوك ✔️ •"],['text'=>"• معلومات التوكن ➕ •"]],
	[['text'=>"• حذف ويب هوك ✖️ •"]]
	]
	])
	]);
	}
elseif($text == "• عمل ويب هوك ✔️ •"){
     sendAction($chat_id, 'typing');
			file_put_contents("data/$from_id/ali.txt","to");
				bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"• حسناً، أرسل التوكن الآن 🎬➕ •",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"• العودة 🔙 •"]
	],
	]
	])
	]);
	}
elseif($ali == "to"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        
        bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• عذراً، يوجد خطأ في التوكن ❗️✖️ •"
]);
    } else{
    file_put_contents("data/$from_id/ali.txt","url");
    file_put_contents("data/$from_id/token.txt",$text);
	SendAction($chat_id,'typing');
	
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• حسناً، أرسل رابط الملف الآن 📁🔝 •",
  ]);
}
}
elseif($ali == "url"){
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text))
  {
  SendAction($chat_id,'typing');
	bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• عذراً، يوجد خطأ في الرابط ❗️✖️•"
]);
 }
 else {
 file_put_contents("data/$from_id/ali.txt","no");
 file_put_contents("data/$from_id/url.txt",$text);
 	bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• يرجى الإنتظار من فضلك 🔜💬 •"
]);
  sleep(1);
   	bot('editmessagetext',[
    'chat_id'=>$chat_id,
    'text'=>"• تبقى القليل فقط 🔜💬 •"
  ]);
  bot('editmessagetext',[
'chat_id'=>$chat_id, 
'message_id'=>$message_id + 1,
'text'=>"• المعلومات صحيحة 🔛✔️ •"
]);
	bot('sendmessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"• هل تريد إتمام العملية ❕🔚 •
    
• أضغط على { • تأكيد 🆗 • } لـإتمام العملية 🔜✔️ •",
'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"• تأكيد 🆗 •"]],
	[['text'=>"• العودة 🔙 •"]
	]
	]
	])
  ]);
 }
}
elseif($text == "• تأكيد 🆗 •" ){
if($to != "no"){
 	 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يرجى الإنتظار من فضلك 🔜💬 •",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"• جاري إتمام العملية🔝➕ •",
  ]);
  file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
    sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"• تمت العملية 🔚✔️ •",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"• تم الرجوع إلى القائمة الرئيسية 🔚 •",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"• عمل ويب هوك ✔️ •"],['text'=>"• معلومات التوكن ➕ •"]],
	[['text'=>"• حذف ويب هوك ✖️ •"]]
	]
	])
	]);
}

}
elseif($text == "• معلومات التوكن ➕ •" ){
    file_put_contents("data/$from_id/ali.txt","token");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• حسناً، أرسل التوكن الآن 🎬➕ •",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'• العودة 🔙 •']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "token"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
      
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        
        bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• عذراً، يوجد خطأ في التوكن ❗️✖️ •"
]);
    } else{
    file_put_contents("data/$from_id/ali.txt","no");
    
	SendAction($chat_id,'typing');

bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• يرجى الإنتظار من فضلك 🔜💬 •",
  ]);
  sleep(1);
  bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"• جاري إتمام العملية🔝➕ •",
  ]);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"• معلومات التوكن 💡🔎 •

• اسم البوت 💬 • $fr

• معرف البوت 🖇 • @$un

• رابط الملف 📌 • $ur",
  ]);
}
}
elseif($text == "• حذف ويب هوك ✖️ •" ){
    file_put_contents("data/$from_id/ali.txt","del");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• حسناً، أرسل التوكن الآن 🎬➕ •",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'• العودة 🔙 •']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "del"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
       
        bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"• عذراً، يوجد خطأ في التوكن ❗️✖️ •"
]);
    } else{
    file_put_contents("data/$from_id/ali.txt","no");
    
	SendAction($chat_id,'typing');
 
bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• جاري إتمام العملية🔝✖️ •",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"• تمت العملية🔝✖️ •",
  ]);
}
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"• تم الرجوع إلى القائمة الرئيسية 🔚 •",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"• عمل ويب هوك ✔️ •"],['text'=>"• معلومات التوكن ➕ •"]],
	[['text'=>"• حذف ويب هوك ✖️ •"]]
	]
	])
	]);
}
elseif($text == "/admin" && $chat_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"• أهلاً بك في لوحة المشرف 🕹 •",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [
              ['text'=>"•المشتركين ☃ •"]],[['text'=>"• رسالة للمشتركين ✉️ •"]],[['text'=>"•توجيه للمشتركين ➡️ •"]],[['text'=>"• العودة 🔙 •"]
              ]
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "•المشتركين ☃ •" && $chat_id == $ADMIN){
	sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " عدد اعضاء البوت : $member_count" , "html");
}
elseif($text == "• رسالة للمشتركين ✉️ •" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","send");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• أرسل نص الآن ✍🏻 •",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'• العودة 🔙 •']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "send" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","no");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• تمت العملية 🔚✔️ •",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
elseif($text == "•توجيه للمشتركين ➡️ •" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","fwd");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• أرسل التوجيه 🔃 •",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'• العودة 🔙 •']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "fwd" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/ali.txt","no");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• جاري إتمام العملية🔝➕ •",
  ]);
$forp = fopen( "Member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"• تمت العملية 🔚✔️ •", 
   ]);
}
?>
