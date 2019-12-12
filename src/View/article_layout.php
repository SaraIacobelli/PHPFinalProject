<?php $this->layout('layout', ['title' => 'Dettaglio articolo']) ?>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center"><?=$titolo?></h1>
	<div  style="display: flex; justify-content: space-between;">
	  <p><i><?=$autore?></i></p>
	  <p><i><?=$data?></i></p>
	</div>
	<p><?=$dettaglio?></p>
</div>