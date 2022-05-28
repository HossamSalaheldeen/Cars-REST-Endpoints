# Cars REST Endpoints

## Website Functionality
This is project aims to make some REST endpoints to work with cars and availability to filter and sort them by attributes and relationships 

## Pattern
Using SOLID design principles and code best practices.
Using the repository design pattern with service layer for business logic.
Using Validation layer.
Writing feature Test cases.

### Prerequisites

Install php, mysql

### Installing
1. Run this command to update composer packages
    ```sh
    composer install
    ```
2. Create a copy of your .env file
    ```sh
    cp .env.example .env
    ```
3. Generate an app encryption key
    ```sh
    php artisan key:generate
    ```
4. Create an empty database for our application in your DBMS
5. In the .env file, add database information to allow Laravel to connect to the database
6. Migrate the database
    ```sh
    php artisan migrate
    ```
   
7. Seed the database
    ```sh
    php artisan db:seed
    ```

8. Open up the server
    ```sh
    php artisan serve
    ```
9. Run tests
   ```sh
   php artisan test
   ```

### API documentation 

https://documenter.getpostman.com/view/14478071/Uz5CLHcV



