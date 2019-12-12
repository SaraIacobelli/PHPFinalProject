<?php
use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class, // "PHPFinalProject\Controller\Home",
    'GET /Article' => Controller\Article::class, // "PHPFinalProject\Controller\Article\{id}",
	'GET /Login' => Controller\Login::class, // "PHPFinalProject\Controller\Login",
	'GET /Register' => Controller\Register::class, // "PHPFinalProject\Controller\Register",
];
