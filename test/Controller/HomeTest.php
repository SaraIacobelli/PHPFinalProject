<?php
//https://stackoverflow.com/questions/28064936/why-is-this-mock-failing-from-phpunit-doc
//https://www.html.it/articoli/phpunit-test-e-funzioni-avanzate/
//https://gist.github.com/chartjes/5518698
//https://stackoverflow.com/questions/28064936/why-is-this-mock-failing-from-phpunit-doc
declare(strict_types=1);

namespace SimpleMVC\Test\Controller;
 
use League\Plates\Engine;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Controller\Home;
use SimpleMVC\Model\PDO_connect;

final class HomeTest extends TestCase
{
    protected $row;
    public function setUp(): void
    {
        $this->plates = new Engine('src/View');
        $this->pdo = $this->createMock(PDO_connect::class);
        $this->home = new Home($this->plates, $this->pdo);

        $sth = $this->getMockBuilder('PDO_connect')
        ->setMethods(array ('execute','fetchAll'))
        ->getMock();
        $oggi =date('Y-m-d');
        $this->assertEquals($this->row, $this->pdo->selectColumnWhere("Articles as ar JOIN Authors as au ON ar.author_id=au.author_id", ['ar.article_id', 'ar.title', 'au.name', 'au.surname', 'ar.content'], "publication_date=?", [$oggi]));
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
        
    }

    public function testExecuteRenderHomeView(): void
    {
        $this->expectOutputString($this->plates->render('home_layout'));
        $this->home->execute($this->request);
    }
}
