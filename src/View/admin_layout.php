<?php $this->layout('layout', ['title' => 'Admin']) ?>


<div  style="display: flex; justify-content: flex-end;">
	<form action=".\Home">
		<button type="submit">Logout</button>
	</form>
</div>
<h1 style="text-align: center">Titolo del giornale </h1>
<h3 style="text-align: center">Articoli del giorno</h3>

<div style="width: 50%; margin: auto;">
<?php for($i=0; $i<$n; $i++):?>
	<h4> <?=$titolo[$i]?></h4>
	
	<p> 
		<?=$dettaglio[$i]?>
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
<form action=".\New>">
			<button type="submit">crea</button>
		</form>
</div>