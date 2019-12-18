<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;



class Admin implements ControllerInterface
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
		
		$titoli=array();
		$testi=array();
		$ids=array();
		$autori=array();

		$query="Select ar.article_id, ar.title, au.name, au.surname, content
		from articles as ar JOIN authors as au ON ar.author_id=au.author_id
		 where au.email = '".$_SESSION['mail']."'";

		$sth = $this->pdo->prepare($query); 
		$sth->execute();
		$n=$sth->rowCount();

		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) { 
			array_push($titoli,$row['title']);
			$testo=$row['content'];
			if (strlen($testo)>100)
			{
				$testo = substr($testo ,0,100);
				$testo = $testo."...";
			}
			array_push($testi, $testo); 
			array_push($ids, $row['article_id']);
			array_push($autori, $row['name']." ".$row['surname']);
		}

		echo $this->plates->render('admin_layout', [
            'id' => $ids,
            'titolo' => $titoli,
			'autore' => $autori,
            'dettaglio' => $testi,
			'n' => $n
			]);
    }
}
