<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class NewArticle implements ControllerInterface
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
		
		session_start();
		
		$query="Select author_id from authors where email = '".$_SESSION['mail']."'";
		
		$user = $_SESSION['mail'];
		
		$row = $this->pdo->selectColumnWhere("authors", ['author_id'], "email=?", [$user]);
		
		$titolo = $request->getParsedBody()['titolo'];
        $d = explode("/",$request->getParsedBody()['data']);
        $data =$d[2]."-". $d[1]."-". $d[0];
        $testo = $request->getParsedBody()['testo'];
		
		$insert = $this->pdo->insert('articles', ['title', 'content', 'publication_date', 'author_id'], ['?','?','?','?'], [$titolo, $testo, $data, $row[0]['author_id']]);
		
		if ($insert)
		{
			header("location: admin");
		}
		else
		{
			http_response_code(500);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '500',
					'titolo' => 'Inserimento fallito',
					'url' => '/nuovo',
					'path' => 'pagina di creazione'
				]
			);
		}
    }
}
