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
    protected $row = [0=>["article_id"=>"1", "title"=>"piero angela dice..", "content"=>"Hello buddy!", "publication_date"=>'15-22-1998', "name"=>'pippo', "surname"=>'pluto']];
    protected $n=1;
    protected $titoli=array();
    protected $testi=array();
    protected $ids=array();
    protected $autori=array();
    protected $i=0;
    /*protected $title = 'Parco Valentine';
    protected $author_id = 1;
    protected $content = 'this';*/

    public function setUp(): void
    {
        $this->plates = new Engine('src/View');
        $this->pdo = $this->createMock(PDO_connect::class);

        $this->pdo->method('selectColumnWhere')
        ->willReturn($this->row);      

        $this->home = new Home($this->plates, $this->pdo);

        $this->pdo->selectColumnWhere("param0", 
        ['param1', 'param2', 'param3', 'param4', 'param5'], 
        "param6", ['param7']);

        
        $this->assertEquals($this->row, $this->pdo->selectColumnWhere("param0", 
        ['param1', 'param2', 'param3', 'param4', 'param5'], 
        "param6", ['param7']));

        $this->n=count($this->row);

        for($this->i=0; $this->i<$this->n; $this->i++)
		{
			array_push($this->titoli,$this->row[$this->i]['title']);
			array_push($this->testi, $this->row[$this->i]['content']); 
			array_push($this->ids, $this->row[$this->i]['article_id']);
			array_push($this->autori, $this->row[$this->i]['name']." ".$this->row[$this->i]['surname']);	
		}

        $this->request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
        
    }

    public function testExecuteRenderHomeView(): void
    {
        $this->expectOutputString($this->plates->render('home_layout',[
            'id' => $this->ids,
            'titolo' => $this->titoli,
			'autore' => $this->autori,
            'dettaglio' => $this->testi,
			'n' => $this->n
        ]));
        
        $this->home->execute($this->request);
    }
}
