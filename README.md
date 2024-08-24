# telegram-business
A simple source code for the new feature of chatbots in the telegram business.

With this bot, you can set questions along with their answers so that the bot will automatically answer them in private chats.
<hr>

### If you have found this project helpful,  you may wish to give it a ⭐️


- USDT (TRC20): `TMjkPcjmd8ZH5hmKmh5i5jvgKZPsmuP1qt`
- USDT (BEP20): `0x3146df77e58F593eBee32156f7ec36926E4c33Eb`
- BTC (Bitcoin): `bc1qjxtj2dtsc63emdj98scsn4t083pxrv5tg6skvf`


## How to run

1- Enter the bot token and the user ID of your account in the index.php file (as you know, you can get token from [botFather](https://t.me/BotFather) and user ID from [userinfobot](https://t.me/userinfobot)):

```php
$token = ""; // bot token
$admin = ""; // userID of your account
```

2- After editing and uploading to your server, it is time to set webhook.
According to [Telegram's documentation](https://core.telegram.org/bots/api#march-31-2024), to get updates related to business, you must specify the relevant updates during setwebhook for this purpose set webhook in the following way (don't forget to replace TOKEN and DOMAIN):
```
https://api.telegram.org/botTOKEN/setwebhook?url=DOMAIN&allowed_updates=["message","edited_message","business_connection","business_message","edited_business_message","deleted_business_messages"]
```

3- To add bots to your chatbots on the Telegram Business section, you must activate this feature in Botfather. To do this, select your bot from the Botfather settings section, go to Business Mode, and turn on the feature.

4- To add the bot to your account, just go to the Telegram Business section in your settings and enter the chatbot section, and enter the bot's username. 

Please note: This feature is only available for premium subscription users.

![New Project (1)](https://github.com/MahdyarEn/telegram-business/assets/90097342/0e325499-afc2-4086-8926-4980405ddef6)


## Features 

You can now easily add or remove questions and answers within the bot. Once you add a question, the bot will automatically respond whenever someone types the corresponding text in your private chat.
![image](https://github.com/user-attachments/assets/80ca036a-ba37-48a4-bfbb-24305ea87eda)

### Multiple content support
Support for several types of content (text, photo, video, sticker, voice, etc.)

![image](https://github.com/user-attachments/assets/436c6d1c-1cbb-484b-ad5f-e325330ca762)


### HTML style support
You can use html to style your text!
Examples:
```html
<b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<u>underline</u>, <ins>underline</ins>
<s>strikethrough</s>, <strike>strikethrough</strike>, <del>strikethrough</del>
<span class="tg-spoiler">spoiler</span>, <tg-spoiler>spoiler</tg-spoiler>
<b>bold <i>italic bold <s>italic bold strikethrough <span class="tg-spoiler">italic bold strikethrough spoiler</span></s> <u>underline italic bold</u></i> bold</b>
<a href="http://www.example.com/">inline URL</a>
<a href="tg://user?id=123456789">inline mention of a user</a>
<tg-emoji emoji-id="5368324170671202286">👍</tg-emoji>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
<pre><code class="language-python">pre-formatted fixed-width code block written in the Python programming language</code></pre>
<blockquote>Block quotation started\nBlock quotation continued\nThe last line of the block quotation</blockquote>
<blockquote expandable>Expandable block quotation started\nExpandable block quotation continued\nExpandable block quotation continued\nHidden by default part of the block quotation started\nExpandable block quotation continued\nThe last line of the block quotation</blockquote>
```

![image](https://github.com/user-attachments/assets/1117a82c-a5af-4e6d-8580-b7cb9f93b124)

### Automatic conversion of premium emojis

![image](https://github.com/user-attachments/assets/b3b1608a-403e-4281-813b-4dd2e53ead09)


## incoming Feature
- [x] Add support for stickers, videos, photos, etc. as responses
- [ ] Automatic conversion of styles used in the text

## Support
If you run into any issues, don't hesitate to reach out to me!
[@MahdyarEn](https://t.me/mahdyarEn)
