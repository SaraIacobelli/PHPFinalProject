<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class ModificaArticle implements ControllerInterface
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
            $data = $_POST['data'];
            $testo = $_POST['testo'];
            
            $sql = "INSERT INTO articles (titolo, data, testo)
            values ($titolo, $data, $testo)";
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
