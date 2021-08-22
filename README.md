## Minimal Blog 
Minimal blogging platform mostly for personal use.

## Technologies Used:
1. Laravel 8.0
2. Laravel Livewire
3. Tailwind CSS

### Installation Process
1. Clone or Download this project
2. Go to the project root directory and execute `composer install` to install all PHP dependencies of the project
3. `npm install or yarn install` to install javascript dependencies
4. `cp .env.example .env ` To copy the content of `.env.example` file to newly created `.env` file 
5. Then execute `php artisan key:generate` on your terminal to generate environment key
6. Then create a Database for this project and edit the .env file to authorise this project on your database
7. Execute `php artisan migrate` terminal on your terminal.
8. Now you are ready to go, If you don't want to create any virtual host for this project then execute
   `php artisan serve`
9. Now visit the url shown on your terminal, something like `127.0.0.1:8000`. It's running!

##### License
MIT
