## Start the project 🚀

1. **Install repository guide.**

    HTTPS:
    ```shell
    git clone https://github.com/mframosg/FraganceStore.git
    ```

    SSH:
    ```shell
    git clone git@github.com:mframosg/FraganceStore.git
    ```

    Switch to the repo folder

    cd te-software

    Install all the dependencies using composer

    ```shell
    composer install
    ```

    Copy the example env file and make the required configuration changes in the .env file
    
    ```shell
    cp .env.example .env
    ```
    ```shell
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=FraganceStore
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    Generate a new application key
    ```shell
    php artisan key:generate
    ```
    Start mysql and create the database
    ```shell
    mysql -u root
    ```
    ```shell
    CREATE DATABASE FraganceStore; 
    ```
    Run the database migrations (**Set the database connection in .env before migrating**)
    ```shell
    php artisan migrate
    ```
    You can start the local development server or go to you http://localhost/FraganceStore/public/ if you have XAMP or WAMP services on
    ```shell
    php artisan serve
    ```
    Now you have access to the server at http://localhost:8000
    
    **Make sure you set the correct database connection information before running the migrations**
    
    2. **Install repository guide.**
