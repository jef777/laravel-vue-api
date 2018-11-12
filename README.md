# laravel-vue-api
Api's made with laravel and consumed in Vue

# install composer dependencies
composer update

# install npm dependencies
npm install

# create a .env file
rename .env.example to .env

# generate a key for your application
php artisan key:generate

# add the database connection config to your .env file
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=taskproject

DB_USERNAME=root

DB_PASSWORD=


# run the migration files to generate the schema
php artisan migrate

# run webpack and watch for changes
npm run watch

# run webpack and watch for changes
run php artisan serve  in a new terminal
