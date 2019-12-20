<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class NewAuthor implements ControllerInterface
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
		$user = $_POST['email'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$pass = password_hash($_POST['psw'], PASSWORD_DEFAULT);

		$row = $this->pdo->insert('Authors', ['name', 'surname', 'email', 'password'], ['?','?','?','?'], [$name, $surname, $user, $pass]);
		
		if ($row)
		{
			header("location: login");
		}
		else
		{
			http_response_code(500);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '500',
					'titolo' => 'Inserimento fallito',
					'url' => '/register',
					'path' => 'pagina di registrazione'
				]
			);
		 
		}
    }
}
