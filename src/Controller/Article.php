<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Article implements ControllerInterface
{
    protected $plates;

    public function __construct(Engine $plates)
    {
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
        $path   = $request->getUri()->getPath();
		$v = explode("/",$path);
		
		if(array_key_exists(2,$v) && $v[2]!="")
		{
			$titolo=urldecode($v[2])  /*str_replace ( "_", " ", $v[2])*/;
		
		
			echo $this->plates->render('article_layout', [
				'titolo' => $titolo,
				'dettaglio' => 'contenuto del articolo selezionato'
			]);
		}
		else
		{
			echo $this->plates->render('error_layout');
		}
    }
}
