<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Login implements ControllerInterface
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
			echo $this->plates->render('login_layout');
		}
}
