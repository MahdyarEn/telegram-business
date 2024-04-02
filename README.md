# telegram-business
A simple source code for the new feature of chatbots in the telegram business.

With this bot, you can set questions along with their answers so that the bot will automatically answer them in private chats.

## How to run

1- Enter the bot token and the user ID of your account in the index.php file (as you know, you can get token from [botFather](https://t.me/BotFather) and user ID from [userinfobot](https://t.me/userinfobot)):

```php
$token = ""; // bot token
$admin = ""; // userID of your account
```

2- After editing and uploading to your server, it is time to set webhook.
According to [Telegram's documentation](https://core.telegram.org/bots/api#march-31-2024), to get updates related to business, you must specify the relevant updates during setwebhook for this purpose set webhook in the following way (don't forget to replace TOKEN and DOMAIN):
```
https://api.telegram.org/botTOKEN/setwebhook?url=DOMAIN&allowed_updates=["message","edited_message","business_connection","business_message","edited_business_message","deleted_business_messages"
```

3- If you want to add bots to your chatbots on the Telegram Business section, you'll need to activate this feature in Botfather. To do this, simply select your bot from the Botfather settings section, then go to Business Mode and turn on the feature.

4- To add the bot to your account, just go to the Telegram Business section in your settings and enter the chatbot section, and enter the bot's username. 

Please note: This feature is only available for premium subscription users.

![New Project (1)](https://github.com/MahdyarEn/telegram-business/assets/90097342/0e325499-afc2-4086-8926-4980405ddef6)


## Features 

You can now easily add or remove questions and answers within the bot. Once you add a question, the bot will automatically respond whenever someone types the corresponding text in your private chat.

![image](https://github.com/MahdyarEn/telegram-business/assets/90097342/d59cb3f2-0c85-4a6c-8da0-ba83392fd759)
![image](https://github.com/MahdyarEn/telegram-business/assets/90097342/a30d2d10-eb08-4385-b4ae-8c08937ce945)

## incoming Feature
- [ ] Add support for stickers, videos, photos, etc. as responses

## Support
If you run into any issues, don't hesitate to reach out to me!
[@MahdyarEn](https://t.me/mahdyarEn)
