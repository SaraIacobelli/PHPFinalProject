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

		$titolo = $request->getParsedBody()['titolo'];
		$d = explode("/",$request->getParsedBody()['data']);
		$data =$d[2]."-". $d[1]."-". $d[0];
		$testo = $request->getParsedBody()['testo'];
		
		$id= $request->getParsedBody()['id'];
		
		$row = $this->pdo->updateTable('articles', ['title', 'content', 'publication_date'], ['?','?','?'], 'article_id=?', [$titolo, $testo, $data, $id]);
		
		if ($row)
		{
			header("location: admin");
		}
		else
		{
			http_response_code(500);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '500',
					'titolo' => 'Aggiornamento del record fallito',
					'url' => '/modify/'.urldecode($titolo),
					'path' => 'pagina di modifica'
				]
			);
			
		}
    }
}
