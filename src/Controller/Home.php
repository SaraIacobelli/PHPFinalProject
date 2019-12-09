<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Home implements ControllerInterface
{
    protected $plates;

    public function __construct(Engine $plates)
    {
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request)
    {
        echo $this->plates->render('home_layout', [
            'id' => ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            'titolo' => ['art1', 'art2', 'art3', 'art4', 'art5', 'art6', 'art7', 'art8', 'art9', 'art10'],
            'dettaglio' => ['contenuto del articolo 1', 'contenuto del articolo 2', 'contenuto del articolo 3', 'contenuto del articolo 4', 'contenuto del articolo 5', 'contenuto del articolo 6', 'contenuto del articolo 7', 'contenuto del articolo 8', 'contenuto del articolo 9', 'contenuto del articolo 10']]);
    }
}
