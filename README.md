## About Anime Project

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Aliquam erat volutpat.

## Requirements

- [XAMPP](https://www.apachefriends.org), or WAMP, MAMP, Laragon.
- [Composer](https://getcomposer.org) - Dependency Manager.

## Setup

1. git clone https://github.com/MartinKohoutek/anime.git
2. cd anime
3. composer install
4. copy .env.example .env
5. in .env file setup db name, for example: DB_DATABASE=anime
6. php artisan key:generate
7. php artisan migrate --seed
8. php artisan serve
9. npm install
10. npm run dev 

## Next Steps 

Now you can visit **localhost:8000** in your browser 

## Testing Accounts
1. email: `admin@gmail.com`, password: 111
2. email: `user@gmail.com`, password: 111 
