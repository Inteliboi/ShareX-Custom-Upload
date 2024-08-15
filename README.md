# A PHP-based ShareX Compatible file storage system

## Features
- Based in PHP! Run it on your cPanel!

## Install
1. Upload `upload.php` to your web server and chmod to `777`.
2. Create a folder named `i` and chmod to `777`.
3. Change the tokens to something random! (This is extremely important for security)!
4. Add example.sxcu to ShareX and configure to your server and token!
5. Profit.

## Changing/Adding tokens to server
1. Open upload.sxcu
2. Find this line `$tokens = array("token1", "token2");`
3. Simply change token1 or token2 to a token of your choosing!
4. If you need more, simply add a comma and quotes.

## Adding token and server to ShareX/SXCU
1. Open `example.sxcu` with a text editor.
2. Change `YOUR_KEY_HERE` to to your key.
3. Change `http://yourdomain.com/upload.php` and `http://yourdomain.com/i/$json:url$` to your domain.
