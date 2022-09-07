<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## ToDo

1. Clone the project.
2. Go to the folder application using cd command on your cmd or terminal.
3. Run composer install on your cmd or terminal.
4. Copy .env.example file to .env on the root folder. ...
5. create a database in mysql named = 'kayne_west_quotes'
6. Change .env file DB_DATABASE=kayne_west_quotes
7. Open your terminal
8. Run php artisan key:generate.
9. Run php artisan migrate.
10. Run php artisan serve.

## Used technology

Laravel , Blade , Passport , Auth UI, Bootstrap , Fontawsome , Jquery , MySQL ,


## Explanation
There are two view for Login and Registration. <br><br>
Homepage is Login page.<br><br>First Register an acount.<br><br>then go to Login Page Enter Credential to access Quotes Page.<br><br>
<b>'/quotes_view'</b> is a web page that shows 5 quotes at a time in the begining. <br>

Refresh button refresh the table and fetch new 5 random quotes.<br>

<b>'/quotes_list_with_token'</b> there are another button that requires passport tokken to access 5 quotes.<br>

in API section with out Passport token we cant access 5 quotes.the token will provide when you will enter valid credential.<br>

with token you can access 5 quote with API.<br>

This App doesn't have feature and unit test beacuse i don't know that much about those.<br>

I didn't read the Github push instruction at first, i am really sorry for that.
<br><b>Thank you</b>