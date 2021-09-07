## Test Task Project
### Using Steps

<hr />

### step 1 clone project by git clone
        git clone https://github.com/samsab1995/test_task.git
<hr />

### step 2 create .env file in root project you can use .env.example file template
<hr />

### step 3 run command
        composer install
<hr />

### step 4 run command 
        php artisan key:generate
<hr />

### step 5 run command 
        php artisan jwt:secret
<hr />

### step 6 Fill .env file with correct data like bellow
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=YOUR_DATABASE_NAME
        DB_USERNAME=YOUR_DATABASE_USERNAME
        DB_PASSWORD=YOUR_DATABASE_PASSWORD
        QUEUE_CONNECTION=database
        MAIL_MAILER=smtp
        MAIL_HOST=mailhog
        MAIL_PORT=1025
        MAIL_USERNAME=YOUR_USERNAME
        MAIL_PASSWORD=YOUR_PASSWORD
        MAIL_ENCRYPTION=YOUR_ENCRYPTION
        MAIL_FROM_ADDRESS=YOUR_FROM_ADDRESS
do not forget create database in phpmyadmin with this name: YOUR_DATABASE_NAME <br/>
the correct data for QUEUE_CONNECTION is database

<hr />

### step 7 now migrate the database
        php artisan migrate

<hr />

### step 8 seeding database
        php artisan db:seed

<hr />

### step 9 run the queue
        php artisan queue:work --tries=3

<hr />

### step 10 serve the server
        php artisan serve

<hr />
 
### postman collection link is : [link](https://www.getpostman.com/collections/b79b98360e67501759a5)

<hr />





  
