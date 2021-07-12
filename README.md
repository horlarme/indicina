# Indicina - Assessment Test

## Installation
Follow the instruction below to install and start the project.

- Running Test
```shell
php artisan test # Green means good.
```

- Dependency Installation
```shell
composer install # Make sure to download and install composer before this. https://getcomposer.org/download/
```

- Environment Configuration
```shell
cp .env.example .env # Make sure to configure .env file after copying. 
```

- Database Migration
```shell
php artisan migrate --force --step # If you run into any error from here, refer to the configuration file (.env)
```

- Running/Start Local Server
```shell
php artisan serve --port 8080
```
