<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class DeleteArticle implements ControllerInterface
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

            $titolo = $_POST['titolo'];
            
            $sql = "DELETE articles (titolo)
            values ($titolo)";
            $sth = $this->pdo->prepare($sql);
            
            if ($sth->execute())
            {
                header("location: Home");
            }
            else
            {
                header("HTTP/1.1 400");
                header("location: Admin");
            }
    }
}
