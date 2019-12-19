<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Nuovo implements ControllerInterface
{
    protected $plates;
	protected $pdo;

    public function __construct(Engine $plates)
    {
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
			session_start();
			echo $this->plates->render('new_layout');
	}
}
