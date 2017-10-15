<?php
require(__DIR__.'/../vendor/autoload.php');
use \NoahBuscher\Macaw\Macaw;

Macaw::get('/', '\Application\Controllers\IndexController@indexPage');
Macaw::get('/logout' , '\Application\Controllers\UserController@logout');

Macaw::get('/login', '\Application\Controllers\IndexController@loginPage');
Macaw::post('/loginSubmit', '\Application\Controllers\UserController@login');

Macaw::get('/register', '\Application\Controllers\IndexController@registerPage');
Macaw::post('/registerSubmit', '\Application\Controllers\UserController@register');

Macaw::get('/search', '\Application\Controllers\SearchController@search');


Macaw::dispatch();