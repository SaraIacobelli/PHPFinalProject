<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Dati implements ControllerInterface
{
    protected $plates;
	protected $pdo;

    public function __construct(Engine $plates, \PDO $pdo)
    {
        $this->plates = $plates;
		$this->pdo = $pdo;
    }

    public function execute(ServerRequestInterface $request)
    {
        //session_start();

            $user = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $pass = $_POST['psw'];

            $sql = "INSERT INTO authors (name, surname, email, password)
            values ($name, $surname, $user, $pass)";
            $sth = $this->pdo->prepare($sql);
            
            if ($sth->execute())
            {
                header("location: Login");
            }
            else
            {
                header("HTTP/1.1 400");
                header("location: Register");
            }
    }
}
