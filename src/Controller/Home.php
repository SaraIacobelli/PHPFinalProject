<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class Home implements ControllerInterface
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
		$titoli=array();
		$testi=array();
		$ids=array();
		$autori=array();
		
		$oggi =date('Y-m-d');
		
		$row = $this->pdo->selectColumnWhere("Articles as ar JOIN Authors as au ON ar.author_id=au.author_id", 
											['ar.article_id', 'ar.title', 'au.name', 'au.surname', 'ar.content'], 
											"publication_date=?", [$oggi]);
		$n=count($row);

		for($i=0; $i<$n; $i++)
		{
			array_push($titoli,$row[$i]['title']);
			$testo=$row[$i]['content'];
			if (strlen($testo)>100)
			{
				$testo = substr($testo ,0,100);
				$testo = $testo."...";
			}
			array_push($testi, $testo); 
			array_push($ids, $row[$i]['article_id']);
			array_push($autori, $row[$i]['name']." ".$row[$i]['surname']);	
		}
		
		echo $this->plates->render('home_layout', [
            'id' => $ids,
            'titolo' => $titoli,
			'autore' => $autori,
            'dettaglio' => $testi,
			'n' => $n
		]);
    }
}
