<?php $this->layout('layout', ['title' => 'Delete']) ?>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center">Elimina articolo</h1>
	<div  style="display: flex; justify-content: space-between;">

    <div class="container">
    <h1>Elimina articolo</h1>
    <hr>
    <form name='titolo' action='..\DeleteArticle' method='POST'>
    <label for="titolo"><b>Titolo</b></label>
    <input type="text" placeholder="Inserisci un titolo" name="titolo" required>
    <hr>
    <button type="submit" class="deletebtn">Elimina</button>
  </div>
</form>
