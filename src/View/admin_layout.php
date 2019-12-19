<?php $this->layout('layout', ['title' => 'Admin']) ?>

<div  style="display: flex; justify-content: space-between;">
	<p>Logged as: <b> <?=$user?> </b></p>
	<form action=".\Home">
		<button type="submit">Logout</button>
	</form>
</div>
<h1 style="text-align: center">Titolo del giornale </h1>
<h3 style="text-align: center">Articoli del giorno</h3>

<div style="width: 50%; margin: auto;">
	<form action=".\Nuovo">
		<button type="submit">Crea</button>
	</form>
	<?php for($i=0; $i<$n; $i++):?>
	<h4> <?=utf8_encode($titolo[$i])?></h4>
	
	<p> 
		<?=utf8_encode($dettaglio[$i])?>
		<form action=".\Modify\<?=urlencode($titolo[$i])?>">
			<button type="submit">modifica</button>
		</form>
        <form action=".\Delete\<?=urlencode($titolo[$i])?>">
            <button type="submit">elimina</button>
		</form>
		
	</p>
	<p style="text-align: right" ><i>written by: <?=$autore[$i]?></i></p>
	 <hr>
	<?php endfor;?>

</div>