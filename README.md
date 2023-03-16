## How to Install

1. Clone this repository 
    ```sh
    git clone https://github.com/rifqiadit10/be-surplus.git
    ```
2. Open CMD and go to project directory
3. run: composer install
4. run: php artisan key:generate
5. run: cp .env.example .env
6. Configure database connection at .env file
7. run: php artisan storage:link
8. run: php artisan migrate:fresh --seed

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
