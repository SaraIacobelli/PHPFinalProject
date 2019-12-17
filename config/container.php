<?php
use League\Plates\Engine;
use Psr\Container\ContainerInterface;
use SimpleMVC\Model\PDO_connect;

return [
    'view_path' => 'src/View',
	'dsn' => 'mysql:dbname=Newspaper;host=localhost',
    'user' => 'phpProject',
    'password' => 'phpPro9?',
    Engine::class => function(ContainerInterface $c) {
        return new Engine($c->get('view_path'));
    },
	PDO::class => function(ContainerInterface $c) {
			return new \PDO($c->get('dsn'), $c->get('user'), $c->get('password'));
	},
	PDO_connect::class => function(ContainerInterface $c) {
		return new PDO_connect($c->get(\PDO::class));
	}
];
