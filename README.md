

## Peer 2 Peer Payment Solution

### Install Guide

Clone the repository.

    https://github.com/Dilshan97/P2P-Payment.git

Change the project directory.
 
`cd P2P-Payment`
 
Install PHP Dependencies using the following command.
 
`composer install`
 
Create env file using the following command.
  
`copy .env.example and rename to .env`

Generate App Key using the following command.
  
`php artisan key:generate`

Fill all needed credentials in env and setup database.

Create database tables using the following command.
  
`php artisan migrate`

Run Server using the following command.

`php artisan serve`

Run the mail queue using the followig command.

`php artisan queue:work`
    

Open browser and go to the url : http://127.0.0.1:8000 for check the website

