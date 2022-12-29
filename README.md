this project is used for convenient scheduling and display of events using the library fullcalendar.io

To run the project after taking clone please run the below commands:

1) copy .env.example .env

2) Change the below 3 values in the .env file:
    * DB_DATABASE=db_name
    * DB_USERNAME=bd_user_name
    * DB_PASSWORD=db_passowrd

3) composer install

4) composer dump-autoload

5) php artisan migrate

6) php artisan db:seed

7) php artisan key:generate

8) php artisan serve --port=8000

9) authorization default values
   * login: demo
   * password: password
   
10) enjoy :)
