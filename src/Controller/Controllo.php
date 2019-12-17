<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Controllo implements ControllerInterface
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
        session_start();

            $user = $_POST['email'];
            $pass = $_POST['psw'];

            $sql = "SELECT email, password
            FROM authors
            WHERE email = :mail";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':mail', $user, \PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetch(\PDO::FETCH_ASSOC);

            if ($pass==$result['password'])
            {
                $_SESSION['mail']=$user;
                header("location: Admin");
            }
            else
            {
                header("HTTP/1.1 400");
                header("location: Login");
            }
    }
}
