## API Source data for weather taken from :

 © Lietuvos hidrometeorologijos tarnyba prie Aplinkos ministerijos

## The app will give you random clothing according to the current weather (1 hour intervals)

    !please note that product is data only for sample usage and cannot be trusted in real life as you might end-up walking with shorts in heavy snow.
    
## No Hosting (yet)

 will update sometime soon
 
## To use the app(while not hosted):

you will need Homestead, or some localhost app
Clone it or fork it, update your composer
in your .env:
change database name;
generate key->
in terminal `php artisan key:generate`
migrations and seeds:
 `php artisan migrate:fresh`
 `php artisan db:seed`
 
local path 'your host'/meteoapi/public


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
