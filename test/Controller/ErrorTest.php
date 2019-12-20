<?php
declare(strict_types=1);

namespace SimpleMVC\Test\Controller;

use League\Plates\Engine;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Controller\Error;

final class ErrorTest extends TestCase
{
    public function setUp(): void
    {
        $this->plates = new Engine('src/View');
        $this->home = new Error($this->plates);
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
    }

    public function testExecuteRenderErrorView(): void
    {
        $this->expectOutputString($this->plates->render('error_layout',['errore' => '404',
        'titolo' => 'Pagina non trovata',
        'url' => '/',
        'path' => 'home page']));
        $this->home->execute($this->request);

        $this->assertEquals(404, http_response_code());
    }
}
