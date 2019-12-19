<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class Delete implements ControllerInterface
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
			
			$row = $this->pdo->selectWhere('articles','title =?' ,[$titolo]);
			
			$d = explode("-",$row[0]['publication_date']);
			
			echo $this->plates->render('delete_layout', [
				'titolo' => $titolo,
				'testo' => $row[0]['content'],
				'data' => $d[2]."/". $d[1]."/". $d[0],
				'id' => $row[0]['article_id']
			]);
		}
		else
		{
			echo $this->plates->render('error_layout');
		}
	}
}