# Laravel Users
Adds parties (humans, businesses, etc) and multiple contact points (emails, phones) to the default Laravel 5.1 users
implementation.

## Installation
1. [Add to your composer file]
1. Add the service provider to the `providers` array in `config/app.php`:  
```GridPrinciples\Users\UserServiceProvider::class,```
1. Publish the package files `php artisan vendor:publish`
1. Run the migrations `php artisan migrate`
1. Set `'driver' => 'gridprinciples',` in `config/auth.php`
