# Laravel Code Generator

Laravel version: 8.26.1 <br>
PHP version: 7.4.3

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)


Clone the repository

    git clone https://github.com/LifelessPixeL/code-generator.git

Switch to the repo folder

    cd code-generator

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
    
Set your database configuration in .env file

    DB_DATABASE=yourdatabasename
    DB_USERNAME=yourusername
    DB_PASSWORD=yourpassword
    
Change queue driver in .env to database

    QUEUE_CONNECTION=database

Generate a new application key

    php artisan key:generate 

Run the database migrations with

    php artisan migrate

Start the local development server

    php artisan serve

Start queue listen to process jobs in local environment

    php artisan queue:listen

You can now access the server at http://localhost:8000

----------

# Code overview

## Dependencies

- [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel) - For excel features