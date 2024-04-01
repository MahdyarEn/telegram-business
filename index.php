<?php
// TOKEN
$token = ""; // bot token
$admin = ""; // userID of your account

// BOT
function bot($method, $datas = [])
{
    global $token;
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/' . $method,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $datas
    ));
    return json_decode(curl_exec($ch));
}
// ================================================ \\

//UPDATE
$update = json_decode(file_get_contents('php://input'));
if (isset($update)) {
    $message = $update->message;
    $text = $message->text;
    $chat_id = $message->chat->id;
    $b_message = $update->business_message;
    $b_id = $b_message->business_connection_id;
    $b_text = $b_message->text;
    $b_message_id = $b_message->message_id;
    $b_chat_id = $b_message->chat->id;
}
// db
$db =  json_decode(file_get_contents('db.json'), true);
$step = $db['step'];
$home = json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "Add auto reply ✉️"]], [['text' => "remove auto reply 🚫"]]]]);
$back = json_encode(['resize_keyboard' => true, 'keyboard' => [[['text' => "Back 🔙"]]]]);
// ================================================ \\

// strat message
if ($text && $chat_id == $admin) {
    if ($text == '/start') {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Hi welcome to Business Account Manager Bot! 🤖\n\nTo use the bot, just go to the telegram business section in your profile, enter the chatbot section and enter the bot username. 💼\n\nNote: Only premium users can use this option. ℹ️", 'reply_markup' => $home]);
    } elseif ($text == 'Back 🔙') {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Hi welcome to Business Account Manager Bot! 🤖\n\nTo use the bot, just go to the telegram business section in your profile, enter the chatbot section and enter the bot username. 💼\n\nNote: Only premium users can use this option. ℹ️", 'reply_markup' => $home]);
        $db['step'] = "";
        file_put_contents("db.json", json_encode($db));
    }
    // add AUTO-REPLY
    elseif ($text == 'Add auto reply ✉️') {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "To set up an auto-reply, type in the message you want the bot to respond to on the first line and the reply on the second.\n\nExample:\n\nHello\nHi, this is MahdyarEn, how can I help you?", 'reply_markup' => $back]);
        $db['step'] = "add";
        file_put_contents("db.json", json_encode($db));
    } elseif ($step == 'add') {
        $explode = explode("\n", $text);
        if (count($explode) >= 2) {
            bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ Successfully registered ", 'reply_markup' => $home]);
            $first_line = array_shift($explode);
            $other_lines = implode("\n", $explode);
            $db['data'][] = [
                'text' => $first_line,
                'answer' => $other_lines
            ];
            $db['step'] = "";
            file_put_contents("db.json", json_encode($db));
        } else {
            bot('sendMessage', ['chat_id' => $chat_id, 'text' => "There is an error. Please follow the example to proceed.\n\nExample:\n\nHello\nHi, this is MahdyarEn, how can I help you?", 'reply_markup' => $back]);
        }
    } elseif ($text == 'remove auto reply 🚫') {
        if (count($db['data']) > 0) {
            foreach ($db['data'] as $item) {
                $list .= "<code>{$item['text']}</code>\n---\n";
            }
            bot('sendMessage', ['chat_id' => $chat_id, 'text' => $list, 'parse_mode' => 'html',]);
            bot('sendMessage', ['chat_id' => $chat_id, 'text' => "To remove an item from the auto-reply, copy and paste one of the above", 'reply_markup' => $back]);
            $db['step'] = "remove";
            file_put_contents("db.json", json_encode($db));
        } else {
            bot('sendMessage', ['chat_id' => $chat_id, 'text' => "auto-reply list is empty!", 'reply_markup' => $home]);
        }
    } elseif ($step == 'remove') {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "✅ Successfully removed ", 'reply_markup' => $home]);
        foreach ($db['data'] as $key => $item) {
            if ($item['text'] == $text) {
                unset($db['data'][$key]);
            }
        }
        $db['step'] = "";
        file_put_contents("db.json", json_encode($db));
    }
}
// Handle messages to Bussiness Account
if ($b_text) {
    foreach ($db['data'] as $item) {
        if ($item['text'] == $b_text) {
            bot('sendMessage', ['business_connection_id' => $b_id, 'chat_id' => $b_chat_id, 'text' => $item['answer'], 'reply_parameters' => json_encode(['message_id' => $b_message_id])]);
        }
    }
}
