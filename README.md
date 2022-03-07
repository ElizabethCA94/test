## How run project locally (dev mode)

1. Create mysql database with name `laravel`

2. Create database structured and seeders with the following command `php artisan migrate:fresh --seed`

3. Run `php artisan run serve`

## Deploy steps (Heroku) (Production)

### Initial config

1. Make sure you have Heroku CLI installer [heroku cli installer](https://devcenter.heroku.com/articles/heroku-cli)

2. Create a heroku app `heroku create name-app`

3. Configure APP_KEY `heroku config:set APP_KEY=put-here-your-app-key`

4. Deploy `main` branch in heroku service `git push heroku main`

### Database config

make sure you have the following environment variables in you heroku settings (environment variables)

```
DB_CONNECTION=mysql
DB_HOST=<your-host>
DB_PORT=3306
DB_DATABASE=<database-name>
DB_USERNAME=<your-user-name>
DB_PASSWORD=<your-password>
```


### App config

make sure you have the following environment variables in you heroku settings (environment variables)

```
APP_NAME=Laravel
APP_ENV=production
APP_KEY=<your-key>
APP_DEBUG=false
APP_URL=<your-url, for example https://elizabeth-carreno-test.herokuapp.com/>
```

### Data migration

Run web bash from heroku with `heroku run bash`, once remote console is ok, run `php artisan migrate --seed`

### SSL (HTTPS) Considerations

In order to prevent `http` (without s (`https`)) make sure to have the following config

in `app\Providers\AppServiceProvider.php` on `boot` method

```php
if (config('app.env') === 'production') {
    URL::forceScheme('https');
}
```

In the file `resources\views\layouts\app.blade.php` about `assets` method will be replace to `secure_asset`


