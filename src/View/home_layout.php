<?php $this->layout('layout', ['title' => 'Home page']) ?>


<h1>Titolo del giornale </h1>
<p>Benvenuti nel nostro giornale</p>
<p>Di seguito sono elencati gli articoli del giorno</p>
<?php for($i=0; $i<10; $i++):?>
	<h4> <?=$titolo[$i]?></h4>
	<p> 
		<?=$dettaglio[$i]?>
		<a href=".\Article\<?=urlencode($titolo[$i]) /*str_replace ( " ", "_", $titolo[$i])*/ ?>">continua a leggere</a>
	</p>
<?php endfor;?>