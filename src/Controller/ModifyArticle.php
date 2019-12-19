<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class ModifyArticle implements ControllerInterface
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

		$titolo = $_POST['titolo'];
		$d = explode("/",$_POST['data']);
		$data =$d[2]."-". $d[1]."-". $d[0];
		$testo = $_POST['testo'];
		
		$id= $_POST['id'];
		
		$row = $this->pdo->updateTable('articles', ['title', 'content', 'publication_date'], ['?','?','?'], 'article_id=?', [$titolo, $testo, $data, $id]);
		
		if ($row)
		{
			header("location: Admin");
		}
		else
		{
			http_response_code(500);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '500',
					'titolo' => 'Aggiornamento del record fallito',
					'url' => '/Modify/'.urldecode($titolo),
					'path' => 'pagina di modifica'
				]
			);
			
		}
    }
}
