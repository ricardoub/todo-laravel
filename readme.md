# About Todo's

Todo's is a web application for task control.

Control your tasks in a simple and efficient way using Todo's. Whit it you can:

* Create a new Task
* Mark a task like:
  * Completed
  * Mark the task as important
  * Mark the task as urgent
* Change an existent task, including:
  * Change your order of execution
  * Change the responsability user
  * Change the current task status

## Employed technology

Todo's was developed using: HTML5, [Bootstrap] (http://getbootstrap.com), [Laravel] (http://laravel.com).
You will need to have the composer instaled or available for use on your machine.

## Contributing

Thank you for considering contributing to the Todo's application! The contribution guide can be found in the [GITHUB](http://github.com/ricardoub/todo-laravel).

## Security Vulnerabilities

If you discover a security vulnerability within Todo's, please send an e-mail to Ricardo Bomfim at ricardoub@gmail.com. All security vulnerabilities will be promptly addressed.

## License

The Todo's application is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Instalation
1. Clone this repository
   * git clone https://github.com/ricardoub/todo-laravel.git
2. Access de new directory
   * cd todo-laravel
3. Install the project dependencies via composer
   * composer install
   * bower install
4. Create de application key
   * php artisan app:name Todo
4. Changing the Settings in the .env file
   * DB_DATABASE=todo
   * DB_USERNAME=todo
   * DB_PASSWORD=todo
5. Create the database
   * php artisan migrate
8. Start the local server
   * php artisan serve
9. Proceed to the Registration page and create a user for you
