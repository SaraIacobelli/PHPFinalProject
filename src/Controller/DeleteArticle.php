<?php

declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Model\PDO_connect;

class DeleteArticle implements ControllerInterface
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

		$row = $this->pdo->delete('articles','article_id=?', [$_POST['id']]);

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
					'titolo' => 'Eliminazione del record fallito',
					'url' => '/delete/'.urldecode($titolo),
					'path' => 'pagina di eliminazione'
				]
			);
			
		}            
    }
}
