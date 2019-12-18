<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Modify implements ControllerInterface
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
			
			$query="Select * from articles where title='".$titolo."'";
			
			$sth = $this->pdo->prepare($query); 
			$sth->execute();
			$row = $sth->fetch(\PDO::FETCH_ASSOC);
			
			$d = explode("-",$row['publication_date']);
			
			echo $this->plates->render('modify_layout', [
				'titolo' => $titolo,
				'testo' => $row['content'],
				'data' => $d[2]."/". $d[1]."/". $d[0],
				'id' => $row['article_id']
			]);
		}
		else
		{
			echo $this->plates->render('error_layout');
		}
	}
}
