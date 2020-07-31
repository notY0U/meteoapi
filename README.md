### Localhost with docker
create .env which should look like this:

    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=meteoapi
    DB_USERNAME=root
    DB_PASSWORD=secret

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

clone repository;
!docker must be installed on your machine;
run commands in your terminal:

    cd [local repository]
    docker-compose up
    
open new terminal window and run commands:

    docker-compose exec php composer install
    docker-compose exec php /bin/sh
    php artisan key:generate
open app in your browser:
    
    localhost:8082

endpoint: ?city={city in Lithuania}


## API Source data for weather taken from :

 © Lietuvos hidrometeorologijos tarnyba prie Aplinkos ministerijos

## The app will give you random clothing according to the current weather (1 hour intervals)

    please note that product is data only for sample usage and cannot be trusted in real life
    as you might end-up walking with shorts in heavy snow.
    
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
