<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class LoginCheck implements ControllerInterface
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

		$user = $request->getParsedBody()['email'];
		$pass = $request->getParsedBody()['psw'];

		$row = $this->pdo->selectWhere('authors','email =?' ,[$user]);
		
		if(count($row)==0)
		{
			http_response_code(401);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '401',
					'titolo' => 'Login fallito',
					'url' => '/login',
					'path' => 'pagina di login'
				]
			);
		}
		else
		{
			
			if (password_verify ($pass, $row[0]['password']))
			{
				$_SESSION['mail']=$user;
				header("location: admin");
			}
			else
			{
				http_response_code(401);
				echo $this->plates->render('error_layout', 
					[
						'errore' => '401',
						'titolo' => 'Login fallito',
						'url' => '/login',
						'path' => 'pagina di login'
					]
				);
			}
		}
    }
}
