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
		$titoli=array();
		$testi=array();
		$ids=array();
		$autori=array();

		$query="Select ar.article_id, ar.title, au.name, au.surname, concat(substring(content,1,100), '...') as testo from articles as ar JOIN authors as au ON ar.author_id=au.author_id";//da guardare
			
		$sth = $this->pdo->prepare($query); 
		$sth->execute();
		$n=$sth->rowCount();

		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) { 
			array_push($titoli,$row['title']);
			array_push($testi,$row['testo']);
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
