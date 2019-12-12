<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Article implements ControllerInterface
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
       
		
		$path   = $request->getUri()->getPath();
		$v = explode("/",$path);
		
		if(array_key_exists(2,$v) && $v[2]!="")
		{
			$titolo=urldecode($v[2]);
			
			$query="Select ar.article_id, ar.title, au.name, au.surname, ar.content, ar.publication_date from articles as ar JOIN authors as au ON ar.author_id=au.author_id where title='".$titolo."'";
			
			$sth = $this->pdo->prepare($query); 
			$sth->execute();
			$row = $sth->fetch(\PDO::FETCH_ASSOC);
			
			$d = explode("-",$row['publication_date']);
		
		
			echo $this->plates->render('article_layout', [
				'titolo' => $titolo,
				'dettaglio' => $row['content'],
				'autore' => $row['name']." ".$row['surname'],
				'data' => $d[2]."/". $d[1]."/". $d[0]
			]);
		}
		else
		{
			echo $this->plates->render('error_layout');
		}
    }
}
