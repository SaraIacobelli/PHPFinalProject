<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class Controllo implements ControllerInterface
{
    protected $plates;
	protected $pdo;

    public function __construct(Engine $plates, PDO_connect $pdo)
    {
        $this->plates = $plates;
		$this->pdo = $pdo;
    }

    public function execute(ServerRequestInterface $request)
    {
        session_start();

		$user = $_POST['email'];
		$pass = $_POST['psw'];

		$row = $this->pdo->selectWhere('authors','email =?' ,[$user]);
		
		if (password_verify ($pass, $row[0]['password']))
		{
			$_SESSION['mail']=$user;
			header("location: Admin");
		}
		else
		{
			http_response_code(401);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '401',
					'titolo' => 'Login fallito',
					'url' => '/Login',
					'path' => 'pagina di login'
				]
			);
		}
    }
}
