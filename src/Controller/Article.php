<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class Article implements ControllerInterface
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
       
		
		$path   = $request->getUri()->getPath();
		$v = explode("/",$path);
		
		if(array_key_exists(2,$v) && $v[2]!="")
		{
			$titolo=urldecode($v[2]);
			
			$row = $this->pdo->selectColumnWhere("Articles as ar JOIN Authors as au ON ar.author_id=au.author_id", 
											['ar.article_id', 'ar.title', 'au.name', 'au.surname', 'ar.content', 'ar.publication_date'], 
											"title=?", [$titolo]);

			$d = explode("-",$row[0]['publication_date']);
		
			echo $this->plates->render('article_layout', [
				'titolo' => $titolo,
				'dettaglio' => $row[0]['content'],
				'autore' => $row[0]['name']." ".$row[0]['surname'],
				'data' => $d[2]."/". $d[1]."/". $d[0]
			]);
		}
		else
		{
			echo $this->plates->render('error_layout');
		}
    }
}
