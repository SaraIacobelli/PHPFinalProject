<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class NewArticle implements ControllerInterface
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
		
		$query="Select author_id from authors where email = '".$_SESSION['mail']."'";
		$sth = $this->pdo->prepare($query); 
		$sth->execute();
		$row = $sth->fetch(\PDO::FETCH_ASSOC);
			
		$titolo = $_POST['titolo'];
        $d = explode("/",$_POST['data']);
        $data =$d[2]."-". $d[1]."-". $d[0];
        $testo = $_POST['testo'];
		
		$sql = "INSERT INTO articles (title, content, publication_date, author_id)
		values ('$titolo', '$testo', '$data', $row[author_id])";
		$sth2 = $this->pdo->prepare($sql); 
		if ($sth2->execute())
		{
			header("location: Admin");
		}
		else
		{
			http_response_code(500);
			echo $this->plates->render('error_layout', 
				[
					'errore' => '500',
					'titolo' => 'Inserimento fallito',
					'url' => '/Nuovo',
					'path' => 'pagina di creazione'
				]
			);
		}
    }
}
