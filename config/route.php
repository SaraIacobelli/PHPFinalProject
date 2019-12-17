<?php
use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class, // "PHPFinalProject\Controller\Home",
	'GET /Home' => Controller\Home::class, // "PHPFinalProject\Controller\Home",
    'GET /Article' => Controller\Article::class, // "PHPFinalProject\Controller\Article\{id}",
	'GET /Login' => Controller\Login::class, // "PHPFinalProject\Controller\Login",
    'GET /Register' => Controller\Register::class, // "PHPFinalProject\Controller\Register",
    'POST /Controllo' => Controller\Controllo::class, // "PHPFinalProject\Controller\controllo",
    'POST /Dati' => Controller\Dati::class, // "PHPFinalProject\Controller\dati",
    'GET /Admin' => Controller\Admin::class, // "PHPFinalProject\Controller\Admin",
	'GET /Nuovo' => Controller\Nuovo::class, // "PHPFinalProject\Controller\Nuovo",
	'GET /Modify' => Controller\Modify::class, // "PHPFinalProject\Controller\Modify",
	'GET /Delete' => Controller\Delete::class, // "PHPFinalProject\Controller\Delete",
	'POST /NewArticle' => Controller\NewArticle::class, // "PHPFinalProject\Controller\New_Article",
	'POST /ModificaArticle' => Controller\ModificaArticle::class, // "PHPFinalProject\Controller\Modify_Article",
	'POST /EliminaArticle' => Controller\DeleteArticle::class, // "PHPFinalProject\Controller\Delete_Article",
];
