<?php
/*
  _    _      _     _           _      __   __
 | |  | |    | |   (_)         | |     \ \ / /
 | |__| | ___| |__  _ _ __ ___ | |_ ___ \ V / 
 |  __  |/ _ \ '_ \| | '__/ _ \| __/ _ \ > <  
 | |  | |  __/ |_) | | | | (_) | ||  __// . \ 
 |_|  |_|\___|_.__/|_|_|  \___/ \__\___/_/ \_\ 
                                              

Project Name : Forward Message Simple
Version : 1.0
Coder : HebiroteX
*/
 // Pengaturan Waktu Indonesia
date_default_timezone_set("ASIA/Jakarta");

// Token & API Telegram
$akses_token = 'token';
$api = 'https://api.telegram.org/bot' . $akses_token;

// botpintar
$waktu = date('d/m/Y  H:i:s');
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$message = $output['message']['text'];
$from = $output['message']['from']['username'];
$msgid = $output['message']['message_id'];



if(strpos($message, 'Under Attack') !== false ){
    forwardMessage("to_chat_id", "from_chat_id", $msgid);
}

function forwardMessage($chat_id,$from_chat_id,$message_id) {
    file_get_contents($GLOBALS['api'].'/forwardMessage?chat_id='.$chat_id.'&from_chat_id='.$from_chat_id.'&message_id='.$message_id);
}

?>