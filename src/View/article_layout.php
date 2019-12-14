<?php $this->layout('layout', ['title' => 'Dettaglio articolo']) ?>
<form action=".\..\Home">
	<button type="submit">Home</button>
</form>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center"><?=utf8_encode($titolo)?></h1>
	<div  style="display: flex; justify-content: space-between;">
	  <p><i><?=$autore?></i></p>
	  <p><i><?=$data?></i></p>
	</div>
	<p><?=utf8_encode($dettaglio)?></p>
</div>