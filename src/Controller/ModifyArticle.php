<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class ModifyArticle implements ControllerInterface
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
			$d = explode("/",$_POST['data']);
            $data =$d[2]."-". $d[1]."-". $d[0];
            $testo = $_POST['testo'];
			
            $sql = "UPDATE articles SET title='$titolo', content='$testo', publication_date='$data' WHERE article_id=$_POST[id]";
            $sth = $this->pdo->prepare($sql);
            
            if ($sth->execute())
            {
                header("location: Admin");
            }
			else
            {
                header("HTTP/1.1 400");
                header("location: Modify/".urldecode($titolo));
            }
    }
}
