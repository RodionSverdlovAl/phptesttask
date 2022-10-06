<?php

use App\Controllers\RegistrationController;
use App\Controllers\AuthController;
use App\Services\Router;

Router::page('/', 'home');
Router::page('/login', 'login');
Router::page('/register', 'register');

Router::post('/auth/reg', RegistrationController::class, 'register');
Router::post('/auth/auth', AuthController::class, 'auth');
Router::post('/auth/logout', AuthController::class, 'logout');

Router::enable();