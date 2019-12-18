<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Error implements ControllerInterface
{
    protected $plates;

    public function __construct(Engine $plates)
    {
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
        http_response_code(404);
        echo $this->plates->render('error_layout', [
            'errore' => '404',
			'titolo' => 'Pagina non trovata',
            'url' => '/',
			'path' => 'home page'
			]);
    }
}
