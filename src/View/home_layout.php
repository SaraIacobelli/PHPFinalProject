<?php $this->layout('layout', ['title' => 'Home page']) ?>


<div  style="display: flex; justify-content: flex-end;">
	<form action=".\Login">
		<button type="submit">Login</button>
	</form>
	 <form action=".\Register">
		<button type="submit">Registrazione</button>
	</form>
</div>
<h1 style="text-align: center">Titolo del giornale </h1>
<h3 style="text-align: center">Articoli del <?=date('d/m/Y')?></h3>

<div style="width: 50%; margin: auto;">

<?php for($i=0; $i<$n; $i++):?>
	<h4> <?=utf8_encode($titolo[$i])?></h4>
	
	<p> 
		<?=utf8_encode($dettaglio[$i])?>
		<form action=".\Article\<?=urlencode($titolo[$i])?>">
			<button type="submit">continua a leggere</button>
		</form>
		
	</p>
	<p style="text-align: right" ><i>written by: <?=$autore[$i]?></i></p>
	 <hr>
<?php endfor;?>
</div>