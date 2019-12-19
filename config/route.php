<?php
use SimpleMVC\Controller;

return [
    'GET /' => Controller\Home::class,
	'GET /home' => Controller\Home::class,
    'GET /article' => Controller\Article::class,
	'GET /login' => Controller\Login::class,
    'GET /register' => Controller\Register::class,
    'GET /admin' => Controller\Admin::class,
	'GET /nuovo' => Controller\Nuovo::class,
	'GET /modify' => Controller\Modify::class,
	'GET /delete' => Controller\Delete::class,
	'POST /NewArticle' => Controller\NewArticle::class,
	'POST /ModifyArticle' => Controller\ModifyArticle::class,
	'POST /DeleteArticle' => Controller\DeleteArticle::class,
	'POST /LoginCheck' => Controller\LoginCheck::class,
    'POST /NewAuthor' => Controller\NewAuthor::class,
];
